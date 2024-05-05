<?php
    
    class universidad_model{
        private $DB;
        private $universidades;

        // Constructor de la clase 
        function __construct(){
            $this->DB=Database::connect();
        }

        // Función para obtener todas las universidades
        function get(){
            $sql= 'SELECT * FROM universidades ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->universidades=$fila;
            return  $this->universidades;
        }

        // Función para crear una universidad
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO universidades(nombre, direccion, telefono) VALUES (?,?,?)";
            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre'],$data['direccion'],$data['telefono']));
            Database::disconnect();       
        }


        // Funcion para obtener una universidad por su id
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM universidades where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        // Función para actualizar una universidad
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE universidades  set  nombre =?, direccion=?, telefono=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombre'],$data['direccion'],$data['telefono'], $date));
            Database::disconnect();

        }

        // Función para eliminar una universidad
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->DB->beginTransaction();
            try {
                // Eliminar carreras asociadas a la universidad
                $sql_delete_carreras = "DELETE FROM carreras WHERE universidad_id = ?";
                $query_delete_carreras = $this->DB->prepare($sql_delete_carreras);
                $query_delete_carreras->execute(array($date));
                
                // Eliminar la universidad
                $sql_delete_universidad = "DELETE FROM universidades WHERE id = ?";
                $query_delete_universidad = $this->DB->prepare($sql_delete_universidad);
                $query_delete_universidad->execute(array($date));
                
                $this->DB->commit();
            } catch (Exception $e) {
                $this->DB->rollBack();
                throw $e;
            }
            Database::disconnect();
        }
        
    }
?>

