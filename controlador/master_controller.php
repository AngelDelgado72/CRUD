<?php 
    require_once('modelo/universidad_model.php');
    require_once('modelo/carrera_model.php');

    /**
     * El controlador principal de la aplicación que se encarga de manejar las peticiones del usuario y de comunicarse con los modelos.
     */
    class master_controller{

        // Instancias de las clases universidad_model y carrera_model
        private $model_universidad;
        private $model_carrera;

        /**
         * Constructor de la clase master_controller. Se encarga de inicializar las instancias de los modelos.
         */
        function __construct(){
            $this->model_universidad=new universidad_model();
            $this->model_carrera=new carrera_model();
        }

        /**
         * Muestra la página principal de la aplicación.
         */
        function index(){
            $query =$this->model_universidad->get();
            include_once('vistas/header.php');
            include_once('vistas/show_universidad.php');
            include_once('vistas/footer.php');
        }

        /**
         * Muestra la página de las carreras.
         */
        function index_carrera(){
            $query =$this->model_carrera->get();
            include_once('vistas/header.php');
            include_once('vistas/show_carrera.php');
            include_once('vistas/footer.php');
        }

        /**
         * Muestra la página de agregar una carrera.
         */
        function add_carrera(){
            $query = $this->model_carrera->get_universidades(); // Obtener las universidades
            include_once('vistas/header.php');
            include_once('vistas/agregar_carrera.php');
            include_once('vistas/footer.php');
        }

        /**
         * Muestra la página de agregar una universidad.
         */
        function add_universidad(){
            include_once('vistas/header.php');
            include_once('vistas/agregar_universidad.php');
            include_once('vistas/footer.php');
        }

        /**
         * Muestra la página de editar una carrera.
         */
        function editar_carrera(){
            $data = NULL;
            if(isset($_REQUEST['id'])){
                $data = $this->model_carrera->get_id($_REQUEST['id']); // Obtener la información de la carrera
            }
            $universidades = $this->model_carrera->get_universidades(); // Obtener la lista de universidades
            include_once('vistas/header.php');
            include_once('vistas/editar_carrera.php');
            include_once('vistas/footer.php');
        }       

        /**
         * Muestra la página de editar una universidad.
         */
        function editar_universidad(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_universidad->get_id($_REQUEST['id']);    
            }
            $query=$this->model_universidad->get();
            include_once('vistas/header.php');
            include_once('vistas/editar_universidad.php');
            include_once('vistas/footer.php');
        }

        /**
         * Crea una nueva carrera.
         */
        function create_carrera(){
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['universidad']=$_REQUEST['txt_universidad'];          
            $this->model_carrera->create_carrera($data);
            header("Location:index.php");
        }

        /**
         * Crea una nueva universidad.
         */
        function create(){
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['direccion']=$_REQUEST['txt_direccion'];
            $data['telefono']=$_REQUEST['txt_telefono'];
           
            $this->model_universidad->create($data);

            header("Location:index.php");
        }

        /**
         * Actualiza una universidad existente.
         */
        function update(){
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['direccion']=$_REQUEST['txt_direccion'];
            $data['telefono']=$_REQUEST['txt_telefono'];
           
            $date=$_REQUEST['id'];
            $this->model_universidad->update($data,$date);
            
            header("Location:index.php");
        }

        /**
         * Actualiza una carrera existente.
         */
        function updateCarrera(){
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['universidad']=$_REQUEST['txt_universidad'];
            $date=$_REQUEST['id'];
            $this->model_carrera->update($data,$date);
            header("Location:index.php");
        }

        /**
         * Muestra la página de confirmación para eliminar una universidad.
         */
        function confirmarDeleteCarrera(){
            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_carrera->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_carrera->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirmCarrera.php');
            include_once('vistas/footer.php');
        }

        /**
         * Muestra la página de confirmación para eliminar una universidad.
         */
        function confirmarDelete(){
            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_universidad->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_universidad->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
        }
    }
?>