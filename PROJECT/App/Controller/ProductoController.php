<?php
require_once("App/Model/Product_Model.php");
require_once("App/Model/UserModel.php");
//definimos la clase controlador por default que se invoca al inicio de la app
    class ProductoController{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        private $modelo;
        // definimos el metodo index de nuestro controlador 
        public function index(){
            $this->modelo = new Modelo_Producto();
            $datos = $this->modelo->getAll();
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="App/View/Admin/IndexEditProductosAdminView.php";
            //incluimos a la plantilla 
            include_once("App/View/Admin/PlantillaAdminView.php");
        }
   
    // !Creamos el metodo para llamar a la vista de agregar productos
    public function CallFormpro()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "App/View/Admin/AddProductsAdminView.php";
            include_once("App/View/Admin/PlantillaAdminView.php");
        } else {
            $vista = "App/View/Admin/AddProductsAdminView.php";
            include_once("App/View/Admin/PlantillaAdminView.php");
        }
    }

    public function Description(){
        //inicializamos a vista con lo que vamos a mostrar en la plantilla 
        $this->modelo = new Modelo_Producto();
        $datos = $this->modelo->getAll();
        $vista="App/View/Public/DescriptionPublicView.php";
        //incluimos a la plantilla 
        include_once("App/View/Public/PlantillaPublicView.php");
    }

        public function CallFormEditpro()
        {
            //verificamos que el metodo de envio de datos sea GET
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                //obtenemos el id del usuario a editar
                $id = $_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos del usuario a editar
                $modelo = new Modelo_Producto();
                $datos = $modelo->getById($id);
                //llamamos a la vista de editar usuario
                session_start();
                if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                    $vista = "App/View/Admin/EditProductsAdminView.php";
                    include_once("App/View/Admin/PlantillaAdminView.php");
                } else {
                    $vista = "App/View/Admin/EditProductsAdminView.php";
                    include_once("App/View/Admin/Plantilla2AdminView.php");
                }
            }
        }

        public function Editproducto()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $producto = array(
                
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'vendedor' => $_POST['fk_vendedor'],
                'existencias' => $_POST['existencias'],
                'id_producto' => $_POST['id']
                
                
            );
            //comenzamos a procesar la imagen 
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                //obtenemos la informacion necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['imagen']['name'];
                $tipoArchivo = $_FILES['imagen']['type'];
                $tamanoArchivo = $_FILES['imagen']['size'];
                $rutaTemporal = $_FILES['imagen']['tmp_name'];
                //validamos que tipo de imagen puedo subir
                $extenciones = array('jpg', 'jpeg', 'png');
                $extencion = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extencion, $extenciones)) {
                    echo "Formato de archivo no valido";
                    exit;
                }
                //validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024;
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "ya mejor sube un video o una lona";
                    exit;
                }
                //generamos el nombre del archivo
                $nombreArchivo = uniqid('Avatar_') . '.' . $extencion;
                $rutaDestino = "App/View/Public/Resources/ProductImage/" . $nombreArchivo;
                //copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $this->modelo = new __userModel();
                $anterior = $this->modelo->getById($_POST['id']);
                if (!empty($anterior['imagen'])) {
                    unlink("App/View/Public/Resources/ProductImage/" . $anterior['imagen']);
                } 

                //tengo que ver si se toco o no se toco el input_file
                $producto['imagen'] = $nombreArchivo;
            } else {
                $producto['imagen'] = $_POST['ava'];
            }
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo = new Modelo_Producto();
            $modelo->updateproducto($producto);
            //redireccionamos al index de usuarios
            header("Location:?C=ProductoController&M=index");
        }
    }
    //!creamos para agregar productos
    public function Addproducto()
    {
        //verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // ! Almacenamos los datos enviados por el formulario en un arreglo de solo los datos de usuario 
            $producto = array (
                
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'vendedor' => $_POST['fk_vendedor'],
                'existencias' => $_POST['existencias'],
                'id_producto' => $_POST['id']      
            );
            
            //comenzamos a procesar la imagen 
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                //obtenemos la informacion necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['imagen']['name'];
                $tipoArchivo = $_FILES['imagen']['type'];
                $tamanoArchivo = $_FILES['imagen']['size'];
                $rutaTemporal = $_FILES['imagen']['tmp_name'];
                //validamos que tipo de imagen puedo subir
                $extenciones = array('jpg', 'jpeg', 'png');
                $extencion = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extencion, $extenciones)) {
                    echo "Formato de archivo no valido";
                    exit;
                }
                //validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024;
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "ya mejor sube un video o una lona";
                    exit;
                }
                //generamos el nombre del archivo
                $nombreArchivo = uniqid('Producto_') . '.' . $extencion;
                $rutaDestino = "App/View/Public/Resources/ProductImage/" . $nombreArchivo;
                //copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $producto['imagen'] = $nombreArchivo;
            }
           
            //comenzamos a procesar la imagen 
            //llamamos al metodo del modelo que agrega al usuario a la base de datos
            $modelo = new Modelo_Producto();
            $res = $modelo->insertprodu($producto);
            //podria poner una consicion en la que si el elemnto fue insertado correctamente
            //llamaria al index de usuarios y si no llamaria al formulario de agregar
            //redireccionamos al index de usuarios
            header("Location:?C=ProductoController&M=index");
        }
    }


    public function Delete()
    {
        
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a eliminar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            //creo un segundo modelo para rescatar el registro con el nombre
            $this->modelo = new Modelo_Producto();
            $usuario = $this->modelo->getById($id); 
            $modelo = new Modelo_Producto();
            $modelo->delete($id);
            //eliminamos el registro
            unlink("app/src/img/avatars/" . $usuario['Avatar']);
            //redireccionamos al index de usuarios
            header("Location:?C=ProductoController&M=index");
        }
        }



    }
    







?>