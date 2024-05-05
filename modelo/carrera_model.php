<?php
    
    class carrera_model{
        private $DB;
        private $carreras;

        // Constructor de la clase 
        function __construct(){
            $this->DB=Database::connect();
        }

        // Función para obtener todas las carreras
        function get(){
            $sql = 'SELECT carreras.*, universidades.nombre AS nombre_universidad 
                    FROM carreras 
                    LEFT JOIN universidades ON carreras.universidad_id = universidades.id 
                    ORDER BY carreras.id DESC';
            $result = $this->DB->query($sql);
            $this->carreras = $result;
            return $this->carreras;
        }

        // Función para obtener todas las universidades
        function get_universidades(){
            $sql = 'SELECT * FROM universidades';
            $result = $this->DB->query($sql);
            return $result;
        }
        
        // Función para crear una carrera
        function create_carrera($data){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO carreras(nombre, universidad_id) VALUES(?,?)";
            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre'], $data['universidad'])); 
            Database::disconnect();       
        }

        // Función para obtener una carrera por su id
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM carreras where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        // Función para actualizar una carrera 
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE carreras  set  nombre =?, universidad_id=? where id=?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombre'],$data['universidad'],$date));
            Database::disconnect();

        }

        // Función para eliminar una carrera
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carreras where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

