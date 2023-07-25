<?php
require_once("App/Model/UserModel.php");

class UserController
{
    private $vista;
    private $__model;

    public function __index()
    {
        //En el index vamos a mostrar una tabla con todos los usuarios

        // Creamos una nuevo objeto
        $__model = new __userModel();
        // Llamamos el metodo getAll
        $datos = $__model->getAll();
        // Creamos la variable de sesion
        session_start();
        // unset($_SESSION['logedin']);
        // Nos fijamos si estamos logeados
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            // Si es así nos dirigimos a la página por parte de admin
            $vista = "App/View/Admin/IndexEditUsersAdminView.php";
            include_once("App/View/Admin/PlantillaAdminView.php");
        } else {
            // En caso contrario, nos dirigimos a la parte del público
            $vista= "App/View/Public/IndexPublicView.php";
            include_once("App/View/Public/PlantillaPublicView.php");
        }
    }

    // Creamos el método para llamar a la vista de agregar usuario
    public function CallFormAdd()
    {
        session_start(); 
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "App/View/Admin/AddUserAdminView.php";
            include_once("App/View/Admin/PlantillaAdminView.php");
        } else {
            $vista = "App/View/Public/RegistroPublicView.php";
            include_once("App/View/Public/PlantillaPublicView.php");
        }
    }

    // Creamos el método para llamar a la vista de inicio de sesión
    public function CallFormLogin()
    {
        
        session_start();
       /*  unset ($_SESSION['logedin']); */
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "App/View/Admin/IndexAdminView.php";
            include_once("App/View/Admin/PlantillaAdminView.php");
        } else {
            $vista = "App/View/Public/InisesionPublicView.php";
            include_once("App/View/Public/PlantillaPublicView.php");
        }
    }

    // Creamos el método para agregar un usuario y dirección
    public function __add()
    {
        // Verificamos si el método de envío de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new __userModel();
            $User = $model->GetById($_POST['id']);

            if ($User['ID_Usuario'] == $_POST['id']) {
                session_start();
                $_SESSION['error'] = 'Este Usuario ya esta registrado';          
                header("Location:?C=UserController&M=CallFormAdd");
                exit; 
                
            } 
            else{

            // Almacenamos los datos enviados por el formulario en un arreglo
            // Datos de usuario
            $user_data = array(
                'username' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'apaterno' => $_POST['appaterno'],
                'amaterno' => $_POST['apmaterno'],
                'email' => $_POST['email'],
                'password' => $_POST['pass'],
                'direccion' => null,
                'telefono' => $_POST['telefono'],
                'imagenPerfil' => $_POST['Fotoperfil'],
                'permisos' => 1
            );
            // Datos de dirección
            $direccion_data = array(
                'colonia' => $_POST['Colonia'],
                'municipio' => $_POST['Municipio'],
                'localidad' => $_POST['Localidad'],
                '_calle' => $_POST['Calle'],
                'codigopostal' => $_POST['Codigo_Postal'],
                'references' => $_POST['Referencias']
            );

            

            // Comenzamos a procesar la imagen
            if (isset($_FILES['Fotoperfil']) && $_FILES['Fotoperfil']['error'] === UPLOAD_ERR_OK) {
                // Obtenemos la información necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['Fotoperfil']['name'];
                $tipoArchivo = $_FILES['Fotoperfil']['type'];
                $tamanoArchivo = $_FILES['Fotoperfil']['size'];
                $rutaTemporal = $_FILES['Fotoperfil']['tmp_name'];
                // Validamos que tipo de imagen podemos subir
                $extensiones = array('jpg', 'jpeg', 'png');
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extension, $extensiones)) {
                    echo "Formato de archivo no válido";
                    exit;
                }
                // Validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024; // 2MB
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "El tamaño del archivo excede el límite permitido";
                    exit;
                }
                // Generamos el nombre del archivo
                $nombreArchivo = uniqid('Avatar_') . '.' . $extension;
                $rutaDestino = "App/View/Public/Resources/AvatarImage/" . $nombreArchivo;
                // Copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $user_data['imagenPerfil'] = $nombreArchivo;
            }

            // Llamamos al método del modelo que agrega al usuario a la base de datos
            $__model = new __userModel();
            // Iniciamos el método
            $res = $__model->insertData($user_data, $direccion_data);
            /* 
            Podría poner una condición en la que si el elemento fue insertado correctamente
            Llamaría al index de usuarios y si no llamaría al formulario de agregar.
            Redireccionamos al index de usuarios.
            */
            
            session_start();
                unset($_SESSION['error']);
                if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                    header("Location:?C=UserController&M=__index");

                } else {
                    header("Location:?C=UserController&M=CallFormLogin");
                }
               
        }
    }
}
    
    // Creamos el método para llamar a la vista de editar usuario
    public function __callFormEdit()
    {
        // Verificamos que el método de envío de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Obtenemos el id del usuario a editar
            $id = $_GET['id'];
            // Llamamos al método del modelo que obtiene los datos del usuario a editar
            $__model = new __userModel();
            $datos = $__model->getById($id);

            // Llamamos a la vista de editar usuario
            session_start();
            if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                $vista = "App/View/Admin/EditUserAdminView.php";
                include_once("App/View/Admin/PlantillaAdminView.php");
            } else {
                $vista = "App/View/Admin/EditUserAdminView.php";
                include_once("App/View/Admin/PlantillaAdminView.php");
            }
    }
}
public function __callFormeditDirecc()
{
    // Verificamos que el método de envío de datos sea GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Obtenemos el id del usuario a editar
        $id = $_GET['id'];
        // Llamamos al método del modelo que obtiene los datos del usuario a editar
        $__model = new __userModel();
        $datos = $__model->getByDireccion($id);

        // Llamamos a la vista de editar usuario
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "App/View/Admin/EditDireccAdminView.php";
            include_once("App/View/Admin/PlantillaAdminView.php");
        } else {
            $vista = "App/View/Admin/EditDireccAdminView.php";
            include_once("App/View/Admin/PlantillaAdminView.php");
        }
}
}

public function __editDirecc()
    {
        // Verificamos que el método de envío de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Almacenamos los datos enviados por el formulario en un arreglo
            $direccion_data = array(
                'id' => $_POST['id'],
                'colonia' => $_POST['Colonia'],
                'municipio' => $_POST['Municipio'],
                'localidad' => $_POST['Localidad'],
                '_calle' => $_POST['Calle'],
                'codigopostal' => $_POST['Codigo_Postal'],
                'references' => $_POST['Referencias']
            );

            // Llamamos al método del modelo que actualiza los datos del usuario
            $__model = new __userModel();
            $__model->updateDirecc($direccion_data);
            // Redireccionamos al index de usuarios
            header("Location:?C=UserController&M=__index");
        }
    }

    // Creamos el método para editar un usuario
    public function __edit()
    {
        // Verificamos que el método de envío de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Almacenamos los datos enviados por el formulario en un arreglo
            $user_data = array(
                'username' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'appaterno' => $_POST['appaterno'],
                'apmaterno' => $_POST['apmaterno'],
                'email' => $_POST['email'],
                'pass' => $_POST['pass'],
                'telefono' => $_POST['telefono'],
                'permisos' => $_POST['permisos']
            );

            // Comenzamos a procesar la imagen
            if (isset($_FILES['Fotoperfil']) && $_FILES['Fotoperfil']['error'] === UPLOAD_ERR_OK) {
                // Obtenemos la información necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['Fotoperfil']['name'];
                $tipoArchivo = $_FILES['Fotoperfil']['type'];
                $tamanoArchivo = $_FILES['Fotoperfil']['size'];
                $rutaTemporal = $_FILES['Fotoperfil']['tmp_name'];
                // Validamos que tipo de imagen podemos subir
                $extensiones = array('jpg', 'jpeg', 'png');
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extension, $extensiones)) {
                    echo "Formato de archivo no válido";
                    exit;
                }
                // Validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024;
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "El tamaño del archivo excede el límite permitido";
                    exit;
                }
                // Generamos el nombre del archivo
                $nombreArchivo = uniqid('Avatar_') . '.' . $extension;
                $rutaDestino = "App/View/Public/Resources/AvatarImage" . $nombreArchivo;
                // Copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $this->__model = new __userModel();
                $anterior = $this->__model->getById($_POST['id']);
                if (!empty($anterior['Fotoperfil'])) {
                    unlink("App/View/Public/Resources/AvatarImage" . $anterior['Fotoperfil']);
                }

                // Tenemos que verificar si se tocó o no el input_file
                $datos['Fotoperfil'] = $nombreArchivo;
            } else {
                $datos['Fotoperfil'] = $_POST['ava'];
            }
            // Llamamos al método del modelo que actualiza los datos del usuario
            $__model = new __userModel();
            $__model->update($user_data);
            // Redireccionamos al index de usuarios
            header("Location:?C=UserController&M=__index");
        }
    }

    // Creamos el método para eliminar un usuario de la base de datos, este método se llamará una vez que 
    // se haya confirmado la eliminación del usuario en la vista de index mediante un confirm de JavaScript
    public function __delete()
    {
        // Verificamos que el método de envío de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Obtenemos el id del usuario a eliminar
            $id = $_GET['id'];
            // Llamamos al método del modelo que elimina al usuario de la base de datos
            // Creamos un segundo modelo para rescatar el registro con el nombre
            $this->__model = new __userModel();
            $usuario = $this->__model->getById($id);
            $__model = new __userModel();
            $__model->delete($id);
            // Eliminamos el registro
            unlink("App/View/Public/Resources/AvatarImage" . $usuario['Fotoperfil']);
            // Redireccionamos al index de usuarios
            header("Location:?C=UserController&M=__index");
        }
    }

    public function __login()
    {
        // Verificamos que se está enviando con el método POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Instanciamos el modelo de usuario
            $this->__model = new __userModel();
            // Obtenemos las credenciales mediante el método getCredentials
            $usuario = $this->__model->getCredentials(
                $_POST['Usuario'],
                $_POST['pass']
            );
            // Verificamos que el usuario exista
            if ($usuario == false) {
                // En caso de que el usuario no exista, lo enviamos a un error
                $vista = "App/View/Public/ERRORLOG.php";
                // Lo incluimos en la parte pública
                include_once("App/View/Public/plantillaPublicView.php");
            } else {
                if ($usuario["Permisos"] == 1) {
                    // PÚBLICO
                    // Iniciamos la sesión
                    session_start();
                    // Instanciamos el login
                    $_SESSION['logedin'] = true;
                    // $_SESSION['foto'] = $usuario['Avatar'];
                    $_SESSION['name'] = $usuario['Nombre'] . ' ' . $usuario['ApPaterno'] . ' ' . $usuario['ApMaterno'];
                    $vista  = "App/View/Public/IndexPublicView.php";
                    // Lo incluimos en la parte pública
                    include_once("App/View/Public/PlantillaPublicView.php");
                } else {
                    // ADMINISTRADOR
                    // Iniciamos la sesión
                    session_start();
                    // El logeo es verdadero
                    $_SESSION['logedin'] = true;
                    // $_SESSION['foto'] = $usuario['Avatar'];
                    $_SESSION['name'] = $usuario['Nombre'] . ' ' . $usuario['ApPaterno'] . ' ' . $usuario['ApMaterno'];
                    // Igualamos la vista de la index por parte del admin
                    $vista  = "App/View/Admin/IndexAdminView.php";
                    include_once("App/View/Admin/PlantillaAdminView.php");
                }

            }
        }
    }

    public function __login_out()
    {
        session_start();
        unset($_SESSION['logedin']);
        // Vista por parte del público
        header("Location:?C=UserController&M=__index");
    }
    
    
}

