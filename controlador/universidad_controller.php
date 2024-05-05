<?php 
    require_once('modelo/universidad_model.php');
    require_once('modelo/carrera_model.php');


    class universidad_controller{

        private $model_e;
        private $model_a;


        function __construct(){
            $this->model_e=new universidad_model();
        }

        function index(){
            $query =$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/show_universidad.php');
            include_once('vistas/footer.php');
        }

        function index_carrera(){
            $query =$this->model_a->get();
            include_once('vistas/header.php');
            include_once('vistas/show_universidad.php');
            include_once('vistas/footer.php');
        }

        function add_carrera(){
            include_once('vistas/header.php');
            include_once('vistas/agregar_carrera.php');
            include_once('vistas/footer.php');
        }


        function add_universidad(){
            include_once('vistas/header.php');
            include_once('vistas/agregar_universidad.php');
            include_once('vistas/footer.php');
        }

        function editar_universidad(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/editar_universidad.php');
            include_once('vistas/footer.php');
        }

        function create(){
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['direccion']=$_REQUEST['txt_direccion'];
            $data['telefono']=$_REQUEST['txt_telefono'];
           
            $this->model_e->create($data);

            header("Location:index.php");

        }

        function update(){
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['direccion']=$_REQUEST['txt_direccion'];
            $data['telefono']=$_REQUEST['txt_telefono'];
           
            $date=$_REQUEST['id'];
            $this->model_e->update($data,$date);
            
            header("Location:index.php");

        }

        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
            
        }


    }
?>