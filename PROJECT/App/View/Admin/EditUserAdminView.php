<!-- Ejemplo de formulario para editar productos -->
<h1>EDITAR USUARIO</h1>
<div class="main__frm">
<form method="POST" class="frm" enctype="multipart/form-data" action="?C=UserController&M=__edit">
    <input type="hidden" value="<?php echo $datos['ID_Usuario'] ?>" name="id" id="id_producto" ><br>

    <label for="Nombre">Nombre:</label>
    <input pattern="[A-Z a-z]*" type="text" value="<?php echo  $datos['Nombre']?>" name="nombre" id="id_producto" ><br>

    <label for="Apellido Paterno">Apellido Paterno</label>
    <input pattern="[A-Za-z]+" type="text" name="appaterno" value="<?php echo  $datos['ApPaterno']?>"><br>

    <label for="APellido Materno">Apellido Materno</label>
    <input pattern="[A-Za-z]+" type="text" name="apmaterno" value="<?php echo  $datos['ApMaterno']?>" id="descripcion" ></input><br>

    <label for="Email">Email:</label>
    <input pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" type="text" name="email"  value="<?php echo  $datos['Correo_Electronico']?>" id="precio" ><br>
        
    <label for="Telefono">Telefono:</label>
    <input minlength="10" maxlength="10" pattern="[0-9]+" required type="text" value="<?php echo  $datos['Telefono']?>" name="telefono" id="existencias"><br>

    <label for="Permisos">Permisos:</label>
    <select name="permisos" id="">
    <?php
    // Obtener el valor de los permisos desde $datos['Permisos']
    $permisos = $datos['Permisos'];

    // Opción para Admin
    echo '<option value="0"';
    // Si el valor de $permisos es 0, seleccionar esta opción
    if ($permisos == 0) {
        echo ' selected';
    }
    echo '>Admin</option>';

    // Opción para Normal
    echo '<option value="1"';
    // Si el valor de $permisos es 1, seleccionar esta opción
    if ($permisos == 1) {
        echo ' selected';
    }
    echo '>Normal</option>';
    ?>
</select>
    <label for="">Foto_Perfil</label>
    <input type="file" value="<?php echo  $datos['Foto_Perfil']?>" name="Fotoperfil" accept="image/*" >

    <input class="btn" type="submit">Guardar cambios</input>
</form>
</div>
<style>
.main__frm{
    display: flex;
    flex-wrap: wrap;
} 
.frm{
    border: solid black;
    border-radius: 5px;
    padding: 20px;
    text-align: center;
    width: fit-content;
    display: inline-block;
    background:wheat
}
.btn{
    color: black;
    background-color: greenyellow;
    border-radius: 20%;
}
select{
             width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
}
        body {
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
        input[type="file"],
        input[type="select"] 
        {
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


