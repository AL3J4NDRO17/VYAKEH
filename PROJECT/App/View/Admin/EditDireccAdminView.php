
      <body>
          <h1 class="register__title">EDITAR DIRECCION</h1>
          <div class="main__frm">
            <form  class="frm" action="?C=UserController&M=__editDirecc" method="POST" enctype="multipart/form-data" name="" id="login" autocomplete="off" >
                
                            <h3 class="direction_title">Edicion </h3>
                          
                            <input type="hidden"  value="<?php echo $datos['ID_Direccion']?>" name="id" placeholder="Ingrese su codigo postal" > <br>

                            <label for="">Codigo Postal</label>
                            <input minlength="5" maxlength="5" pattern="[0-9]+" type="text" required value="<?php echo $datos['Codigo_Postal']?>" name="Codigo_Postal" placeholder="Ingrese su codigo postal" > <br>
                            
                            <label for="">Calle</label>
                            <input required type="text" required value="<?php echo $datos['Calle']?>" name="Calle" placeholder="Ingrese su calle" > <br> 
                            
                            <label for="">Municipio</label>
                            <input required  type="text" required value="<?php echo $datos['Municipio']?>" name="Municipio" placeholder="Ingrese su municipio" > <br> 

                            <label for="">Localidad</label>
                            <input required type="text" required value="<?php echo $datos['Localidad']?>" name="Localidad" placeholder="Ingrese su localidad" > <br> 

                            <label for="">Colonia</label>
                            <input required type="text" required value="<?php echo $datos['Colonia']?>" name="Colonia"placeholder="Ingrese su Colonia" > <br> 

                            <label for="">Referencias</label>
                            <input required type="text" required value="<?php echo $datos['Referencias']?>" name="Referencias"placeholder="Ingrese alguna referencia" > <br> 

                              <input type="submit" class="btn-submit" placeholder="Enviar" value="Enviar" id="sub"></input>          
            </form>
          </div>
      </body>
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
