<!-- Ejemplo de formulario para editar productos -->
<h1>Añadir Usuario</h1>

<div class="main__frm">
<form class="frm" method="POST" autocomplete="off" enctype="multipart/form-data" action="?C=UserController&M=__add">
    <label for="ID">Username:</label>
    <input pattern="[A-Za-z0-9]+" minlength="5" required type="text"  name="id" id="id_producto" ><br>

    <label for="Nombre">Nombre:</label>
    <input pattern="[A-Z a-z]+" required type="text"  name="nombre" id="id_producto" ><br>

    <label for="Apellido Paterno">Apellido Paterno</label>
    <input pattern="[A-Za-z]+" required type="text" name="appaterno"  id="fk_vendedor" ><br>

    <label for="APellido Materno">Apellido Materno</label>
    <input pattern="[A-Za-z]+" type="text" required name="apmaterno"  id="descripcion" ></textarea><br>

    <label for="Email">Email:</label>
    <input pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required type="text" name="email"   id="precio" ><br>

    <label for="password">Password:</label>
    <input  required type="text" name="pass" id="precio" ><br>
    
    <label for="Telefono">Telefono:</label>
    <input minlength="10" maxlength="10" pattern="[0-9]+" required type="text" name="telefono" id="existencias"><br>

    
    <!-- input required type="text" name="permisos" id="existencias"><br> -->
    
    <label for="">Foto_Perfil</label>
    <input type="file" name="Fotoperfil" accept="image/*" >

    <details>
        
    <summary> <h3 class="direction_title">Registro de Direccion </h3></summary>
                            <label for="">Codigo Postal</label>
                            <input minlength="5" maxlength="5" pattern="[0-9]+" type="text" class="data_txt" name="Codigo_Postal" placeholder="Ingrese su codigo postal" > <br>
                            
                            <label for="">Calle</label>
                            <input required type="text" class="data_txt" name="Calle" placeholder="Ingrese su calle" > <br> 
                            
                            <label for="">Municipio</label>
                            <input required type="text" class="data_txt" name="Municipio" placeholder="Ingrese su municipio" > <br> 

                            <label for="">Localidad</label>
                            <input required type="text" class="data_txt" name="Localidad" placeholder="Ingrese su localidad" > <br> 

                            <label for="">Colonia</label>
                            <input required type="text" class="data_txt" name="Colonia"placeholder="Ingrese su Colonia" > <br> 

                            <label for="">Referencias</label>
                            <input required type="text" class="data_txt" name="Referencias"placeholder="Ingrese alguna referencia" > <br> 
        
    </details>
    

    <input type="submit">Guardar cambios</input>
    </div>
</form>
<style>
.main__frm{
    display: flex;
    flex-wrap: wrap;
}

.btn{
    color: black;
    background-color: greenyellow;
    border-radius: 20%;
   
}

       .bodyeditproductos {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            
           
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .frm {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
</style>
<?php
// JavaScript para mostrar el alert si existe un error en la variable de sesión
echo "<script>
    window.onload = function() {
        var error = '" . (isset($_SESSION['error']) ? $_SESSION['error'] : "") . "';
        if (error) {
            alert(error);
            delete " . (isset($_SESSION['error']) ? '$_SESSION[\'error\']' : "") . ";
        }
    }
</script>";



