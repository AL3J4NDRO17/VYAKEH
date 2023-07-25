<?php
require_once("App/Model/Product_Model.php");
//definimos la clase controlador por default que se invoca al inicio de la app
    class ShopController{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        private $modelo;
        // definimos el metodo index de nuestro controlador 
        public function index(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $this->modelo = new Modelo_Producto();
            $datos = $this->modelo->getAll();
            $vista="App/View/Public/ShopPublicView.php";
            //incluimos a la plantilla 
            include_once("App/View/Public/PlantillaPublicView.php");
        }
        public function index_Admin(){
            $this->modelo = new Modelo_Producto();
            $datos = $this->modelo->getAll();
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="App/View/Public/ShopPublicView.php";
            //incluimos a la plantilla 
            include_once("App/View/Admin/PlantillaAdminView.php");
        }
        public function Description(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $this->modelo = new Modelo_Producto();
            $datos = $this->modelo->getAll();
            $vista="App/View/Public/DescriptionPublicView.php";
            //incluimos a la plantilla 
            include_once("App/View/Public/PlantillaPublicView.php");
        }
    }  
?>
