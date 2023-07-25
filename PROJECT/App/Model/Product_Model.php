<?php
class Modelo_Producto
{
    // Declaracion de la variable para la conexion
    private $productoConnection;

    // Constructor para inicializar la variable de conexion
    public function __construct()
    {   
        // Importacion del archivo conexion de php
        require_once("App/Config/DataBaseConect.php");

        // Inicializacion de la variable de conexion
        $this->productoConnection = new Database_Conexion();
    
    }   

    // Metodos para la insercion, eliminacion y actualizacion de datos, asi como metodos para obtener datos

    // Obtener todos los datos
    public function getAll()
    {
        // Creamos el codigo de la consulta
        $__query = "CALL GETProductos()";
        
        // Obtenenmos la conexion de la clase padre
        $__connection = $this->productoConnection->_GetConnection();

        // Ejecutamos la consulta donde obtendremos los resultados
        $result = $__connection->query($__query);

        // Instanciamos una variable de tipo array
        $__productos = array();

        // Obtenemos resultados para guardarlos en la variable
        while($_producto = $result->fetch_assoc()){
            $__productos[] = $_producto;
        }
        // Cerramos la conexion
        $this->productoConnection->_CloseConnection();

        return $__productos;

    }
    public function getById($id)
    {
        // Creamos el codigo de la consulta
        $__query= "CALL GETByIDProducto ('$id')";

        // Obtenemos la conexion de la clase padre
        $__connection = $this->productoConnection->_GetConnection();

        // Ejecutamos la consulta
        $_result = $__connection->query($__query);

        // Verficamos los resultados
        if($_result && $_result->num_rows > 0)
            $__productos = $_result->fetch_assoc();
        else
            $__productos = false;
        
        // Cerramos la conexion
        $this->productoConnection->_CloseConnection();

        // Retornamos el resultado
        return $__productos;
    }
   
    public function insertprodu($dato)
    {
        //paso1 creamos la consulta 
        $sql_p = "CALL InsertProducto (               
                '" . $dato['id_producto'] . "',
                '" . $dato['nombre'] . "',
                '" . $dato['vendedor'] . "',
                '" . $dato['descripcion'] . "',
                '" . $dato['precio'] . "',
                '" . $dato['existencias'] . "',
                '" . $dato['imagen'] . "'            
         )";
        //paso 2 conectamos a la base de datos
        $connection = $this->productoConnection->_GetConnection();
        //paso 3 ejecutamos la consulta
        $result = $connection->query($sql_p);
        //paso 4 preparamos la respuesta
        if ($result) {
            $res = true;
        } else {
            $res = false;
        }
        //paso 5 cerramos la coneccion
        $this->productoConnection->_CloseConnection();
        //paso 6 arrojamos resultados
        return $res;
    }
       
    public function updateproducto($productos){
        //paso1 creamos la consulta
            $sql = "CALL UpdateProducto (
            '".$productos['id_producto']."',
            '".$productos['nombre']."',
            '".$productos['vendedor']."', 
            '".$productos['descripcion']."',   
            '".$productos['precio']."',
            '".$productos['existencias']."',
            '".$productos['imagen']."'
            
            )";
        //paso 2 conectamos a la base de datos
        $connection =$this->productoConnection->_GetConnection();
        //paso 3 ejecutamos la consulta
        $result = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($result){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->productoConnection->_GetConnection();
        //paso 6 arrojamos resultados
        return $res;
    }

    public function delete($id){
        //paso1 creamos la consulta
        $sql="Call DeleteProductoByID($id)";
        //paso 2 conectamos a la base de datos
        $connection =$this->productoConnection->_GetConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->productoConnection->_CloseConnection();
        //paso 6 arrojamos resultados
        return $res;
    }


 
}
?>