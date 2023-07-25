<?php
//definimos la clase controlador por default que se invoca al inicio de la app
    class HomeController{
        //el controlador tiene un atributo llamado vista 
        private $vista;
        
        // definimos el metodo index de nuestro controlador 
        public function index(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="App/View/Public/IndexPublicView.php";
            //incluimos a la plantilla 
            include_once("App/View/Public/PlantillaPublicView.php");
        }
        public function index__Admin(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="App/View/Admin/IndexAdminView.php";
            //incluimos a la plantilla 
            include_once("App/View/Admin/PlantillaAdminView.php");
        }


    }
?>
