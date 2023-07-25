<!-- Ejemplo de formulario para editar productos -->
<h1>AÑADIR PRODUCTOS</h1>
<div class="main__frm">
<form class="frm" method="POST" enctype="multipart/form-data" action="?C=ProductoController&M=Addproducto">
    <label for="id_producto">ID:</label>
    <input pattern="[0-9]+" required type="text" name="id" id="id_producto" ><br>

    <label for="id_producto">Nombre Producto:</label>
    <input  required pattern="[A-Za-z]+" minlength="2" maxlength="30" required type="text" name="nombre" id="id_producto" ><br>

    <label for="fk_material">Vendedor:</label>
    <input pattern="[0-9]+" type="text" name="fk_vendedor" id="fk_vendedor" required ><br>

    <label for="descripcion">Descripción:</label>
    <input required maxlength="300" type="text" name="descripcion" id="descripcion" required ></text><br>

    <label for="precio">Precio:</label>
    <input  required pattern="[0-9]+" pattern="[0-9]+" type="text" name="precio" id="precio" required ><br>

    <label for="existencias">Existencias:</label>
    <input required pattern="[0-9]+" pattern="[0-9]+" type="text" name="existencias" id="existencias" required><br>

    <label for="">Foto de perfil</label>
    <input type="file" name="imagen" accept="image/*" >

    <input type="submit">Guardar cambios</button>
</form>
</div>
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