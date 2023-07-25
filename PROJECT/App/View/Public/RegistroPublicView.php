
<link rel="stylesheet" href="App/View/Public/Css/ReStyle.css">
   <div class="body_content">
      <body>
          <h1 class="register__title">Registro</h1>
            <form class="form__container" action="?C=UserController&M=__add" method="post" enctype="multipart/form-data" name="" id="login" autocomplete="off" >
                  <fieldset class="tip__container">
                    <h3 class="tip__title">Registrate Nuevo Usuario!!</h3>
                  </fieldset> 
                  <fieldset class="fieldset__container">
                    <svg class="icon-register" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                      <div class="data_section">
                        <label for="Usuario">Usuario</label><br>
                        <input type="text" class="data_txt" name="id" required placeholder="Ingrese su Usuario" > <br>
                
                              <label for="">Nombre </label><br>
                              <input pattern="[A-Z a-z]+" type="text" class="data_txt"name="nombre" required placeholder="Ingrese sus Nombre"> <br>
                        
                        
                              <label for="">Apellido Paterno </label><br>
                              <input pattern="[A-Za-z]+" type="text" class="data_txt" name="appaterno" required placeholder="Ingrese su Apellido Paterno"> <br>
                          
                          
                              <label for="">Apellido Materno </label><br>
                              <input pattern="[A-Za-z]+" type="text" class="data_txt" name="apmaterno" required placeholder="Ingrese su Apellido Materno"> <br>
                          
                        
                            <label for="">Correo Electronico</label><br>
                            <input required="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" type="text" class="data_txt" name="email" required placeholder="Ingrese su Correo Electronico">  <br>
                        
                        
                            <label for="">Contraseña</label><br>
                            <input type="text" class="data_txt" name="pass" required placeholder="Ingrese su Contraseña" id="c" minlength="8"> <br>
                        
                        
                            <label for="">Confirme su Contraseña</label><br>
                            <input type="text" class="data_txt" name="confirmpass" required placeholder="Confirme su Contraseña" id="d"> <br>
                    
                      
                            <label for="">Telefono</label><br>
                            <input minlength="10" maxlength="10" pattern="[0-9]+" type="text" class="data_txt" name="telefono" required placeholder="Ingrese su Numero Telefonico" minlength="10" pattern="[0-9]*"> <br>
                                                  
                            <h3 class="direction_title">Registro de Direccion </h3>
                            <label for="">Codigo Postal</label>
                            <input minlength="5" maxlength="5" pattern="[0-9]+" type="text" class="data_txt" name="Codigo_Postal" required placeholder="Ingrese su codigo postal" minlength="5" pattern="[0-9]*"> <br>
                            
                            <label for="">Calle</label>
                            <input type="text" class="data_txt" name="Calle" required placeholder="Ingrese su calle" > <br> 
                            
                            <label for="">Municipio</label>
                            <input type="text" class="data_txt" name="Municipio" required placeholder="Ingrese su municipio" > <br> 

                            <label for="">Localidad</label>
                            <input type="text" class="data_txt" name="Localidad" required placeholder="Ingrese su localidad" > <br> 

                            <label for="">Colonia</label>
                            <input type="text" class="data_txt" name="Colonia" required placeholder="Ingrese su Colonia" > <br> 

                            <label for="">Referencias</label>
                            <input type="text" class="data_txt" name="Referencias" required placeholder="Ingrese alguna referencia" > <br> 

                            <label for="">Foto de perfil</label>
                            <input type="file" name="Fotoperfil" accept="image/*" >


                              <div class="link__container">
                              <a class="link__register" href="?C=UserController&M=CallFormlogin">Ya esta registrado? Iniciar sesion</a>
                                <?php
                                if (isset($_SESSION['error'])) {
                                  echo '<script>alert("El usuario ya existe")</script>';
                                  echo $_SESSION['error'];
                                  unset($_SESSION['error']);
                                } ?>
                              <input type="submit" class="btn-submit" placeholder="Enviar" value="Enviar" id="sub"></button>
                              </div>            
                      </div>
                    </fieldset>          
            </form>
    
      </body>
    </div>

