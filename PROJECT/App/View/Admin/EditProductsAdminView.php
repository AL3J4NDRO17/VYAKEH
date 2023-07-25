<body class="bodyeditproductos">
    

<!-- Ejemplo de formulario para editar productos -->
<h1>EDITAR PRODUCTOS</h1>
<div class="main__frm">
<form method="POST" autocomplete="FALSE" class="frm" enctype="multipart/form-data" action="?C=ProductoController&M=Editproducto">
    
    <input type="hidden" value="<?php echo $datos['ID_Productos'] ?>" name="id" pattern="[0-9]" maxlength="1"><br>

    <label for="id_producto">Nombre Producto:</label>
    <input required pattern="[A-Za-z]+" minlength="2" maxlength="30" type="text" value="<?php echo $datos['Nombre']?>" name="nombre" ><br>
 
   
    <input hidden type="text" name="fk_vendedor" value="<?php echo $datos['FK_Vendedor']?>" id="fk_vendedor" ><br>

    <label for="descripcion">Descripción:</label>
    <input required  type="text" name="descripcion" value="<?php echo $datos['Descripcion']?>" id="descripcion" ></input><br>

    <label for="precio">Precio:</label>
    <input required pattern="[0-9]+" type="text" name="precio"  value="<?php echo $datos['Precio']?>" id="precio" ><br>

    <label for="existencias">Existencias:</label>
    <input required pattern="[0-9]+" type="text" value="<?php echo $datos['Existencias']?>"  name="existencias" id="existencias"><br>

    <label for="">Imagen del Producto</label>
    <input type="file" value="<?php echo $datos['Img_Product']?>" name="imagen" accept="image/*" >

    <input class="btn" type="submit">Guardar cambios</input>
</form>
</div>
</body>
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





