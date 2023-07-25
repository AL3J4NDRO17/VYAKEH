<?php

class __userModel
{
    // Creamos un atributo para manipular los datos en la base de datos
    private $userConnection;

    // Definimos el constructor de la clase UserModel
    public function __construct()
    {
        // Requerimos la clase de conexión a la base de datos
        require_once('App/Config/DataBaseConect.php');
        // Instanciamos userConnection con Database_Conexion
        $this->userConnection = new Database_Conexion();
    }

    // Método para obtener todos los usuarios
    public function getAll()
    {
        // Crear la consulta
        $sql = "CALL GetUsuarios()";
        // Obtener la conexión
        $connection = $this->userConnection->_GetConnection();
        // Ejecutar la consulta
        $result = $connection->query($sql);
        // Verificar y formatear los datos
        $users = array();
        while ($user = $result->fetch_assoc()) {
            $users[] = $user;
        }
        // Cerrar la conexión
        $this->userConnection->_CloseConnection();
        // Devolver los resultados
        return $users;
    }
   

    // Método para obtener un usuario por su ID
    public function getById($id)
    {
        // Crear la consulta    
        $sql = "CALL GetUsuarioById('$id')";
        // Obtener la conexión
        $connection = $this->userConnection->_GetConnection();
        // Ejecutar la consulta
        $result = $connection->query($sql);
        // Verificar y obtener los datos
        if ($result && $result->num_rows > 0) {
            $users = $result->fetch_assoc();
        } else {
            $users = false;
        }
        // Cerrar la conexión
        $this->userConnection->_CloseConnection();
        // Devolver el resultado
        return $users;
    }

    public function getByDireccion($id)
    {
        // Crear la consulta    
        $sql = "CALL GETByFKDireccion('$id')";
        // Obtener la conexión
        $connection = $this->userConnection->_GetConnection();
        // Ejecutar la consulta
        $result = $connection->query($sql);
        // Verificar y obtener los datos
        if ($result && $result->num_rows > 0) {
            $users = $result->fetch_assoc();
        } else {
            $users = false;
        }
        // Cerrar la conexión
        $this->userConnection->_CloseConnection();
        // Devolver el resultado
        return $users;
    }
    // Método para verificar las credenciales de inicio de sesión
    public function getCredentials($username, $password)
    {
        // Crear la consulta
        $sql = "CALL GETCREDENTIALS('$username','$password')";
        // Obtener la conexión
        $connection = $this->userConnection->_GetConnection();
        // Ejecutar la consulta
        $result = $connection->query($sql);
        // Verificar y obtener los datos
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            $user = false;
        }
        // Cerrar la conexión
        $this->userConnection->_CloseConnection();
        // Devolver el resultado
        return $user;
    }

    // Método para insertar usuarios
    public function insertData($user, $direccion)
    {
        // Obtener el último ID que se ha insertado
        $lastestId = $this->getLastIdDireccion();
        // Verificar el último ID insertado
        if ($lastestId != 0) {
            // Si es diferente de 0, se incrementa en 1 para obtener un nuevo ID
            $id = $lastestId + 1;
        } else {
            // Si es igual a 0, se establece como el primer ID
            $id = 1;
        }
            // Crear la consulta para insertar datos en la tabla "Direccion"
            $sqlDireccion = "Call InsertarDireccionProcedure(
                '" . $id . "',
                '" . $direccion['_calle'] . "',
                '" . $direccion['codigopostal'] . "',
                '" . $direccion['municipio'] . "',
                '" . $direccion['localidad'] . "',
                '" . $direccion['colonia'] . "',
                '" . $direccion['references'] . "'
            )";
            // Asignar el campo FK_Direccion del usuario con el ID insertado en la tabla "Direccion"
            $user['direccion'] = $id;

            // Crear la consulta para insertar datos en la tabla "Usuario"
            $sqlUsuario = "CALL InsertarUsuario(
                '" . $user['username'] . "',
                '" . $user['nombre'] . "',
                '" . $user['apaterno'] . "',
                '" . $user['amaterno'] . "',         
                '" . $user['email'] . "',
                '" . $user['password'] . "',
                '" . $user['telefono'] . "',
                '" . $user['direccion'] . "',
                '" . $user['imagenPerfil'] . "',     
                '" . $user['permisos'] . "'        
            )"; 
        
        
        // Obtener la conexión a la base de datos
        $connection = $this->userConnection->_GetConnection();
        // Ejecutar las consultas
        $connection->query($sqlDireccion);
        $result = $connection->query($sqlUsuario);
        // Preparar la respuesta
        if ($result) {
            $res = true;
        } else {
            $res = false;
        }
        // Cerrar la conexión
        $this->userConnection->_closeConnection();
        // Devolver el resultado
        return $res;
    }

    // Método para actualizar usuarios
    public function update($user)
    {
        // Crear la consulta
        $sql = "Call UpdateUsuario(
        '" . $user["username"] . "',
        '" . $user["nombre"] . "',
        '" . $user["appaterno"] . "',
        '" . $user["apmaterno"] . "',
        '" . $user["email"] . "',
        '" . $user["pass"] . "',
        '" . $user["telefono"] . "',
        '" . $user["Fotoperfil"] . "',
        '" . $user["permisos"] . "'
    )";

        // Obtener la conexión a la base de datos
        $connection = $this->userConnection->_GetConnection();
        // Ejecutar la consulta
        $result = $connection->query($sql);
        // Preparar la respuesta
        if ($result) {
            $res = true;
        } else {
            $res = false;
        }
        // Cerrar la conexión
        $this->userConnection->_CloseConnection();
        // Devolver el resultado
        return $res;
    }
    public function updateDirecc($direccion)
    {
        // Crear la consulta
        $sql = "Call UpdateDireccion(
                '" . $direccion['id'] . "',
                '" . $direccion['_calle'] . "',
                '" . $direccion['codigopostal'] . "',
                '" . $direccion['municipio'] . "',
                '" . $direccion['localidad'] . "',
                '" . $direccion['colonia'] . "',
                '" . $direccion['references'] . "'
            )";

        // Obtener la conexión a la base de datos
        $connection = $this->userConnection->_GetConnection();
        // Ejecutar la consulta
        $result = $connection->query($sql);
        // Preparar la respuesta
        if ($result) {
            $res = true;
        } else {
            $res = false;
        }
        // Cerrar la conexión
        $this->userConnection->_CloseConnection();
        // Devolver el resultado
        return $res;
    }

    // Método para eliminar usuarios por su ID
    public function delete($id)
    {
        // Crear la consulta
        $sql = "CALL DeleteUsuario('$id')";
        // Obtener la conexión a la base de datos
        $connection = $this->userConnection->_GetConnection();
        // Ejecutar la consulta
        $result = $connection->query($sql);
        // Preparar la respuesta
        if ($result) {
            $res = true;
        } else {
            $res = false;
        }
        // Cerrar la conexión
        $this->userConnection->_CloseConnection();
        // Devolver el resultado
        return $res;
    }

    // Obtener el último ID registrado en la tabla "Direccion"
    public function getLastIdDireccion()
    {
        // Obtener la conexión a la base de datos
        $connection = $this->userConnection->_GetConnection();
        // Crear la consulta para obtener el último ID insertado
        $sql = "SELECT MAX(ID_Direccion) AS max_id FROM Direccion";
        // Inicializar la variable del último ID
        $latestId = 0;
        // Ejecutar la consulta
        $result = $connection->query($sql);
        // Verificar los resultados
        if ($result) {
            // Obtener la fila
            $row = $result->fetch_assoc();
            // Obtener el último ID
            $latestId = $row['max_id'];
        }
        // Devolver el último ID insertado en la tabla "Direccion"
        return $latestId;
    }
}
?>
