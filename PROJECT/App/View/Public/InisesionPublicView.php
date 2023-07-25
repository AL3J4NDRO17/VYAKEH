<link rel="stylesheet" href="App/View/Public/Css/IniStyle.css">
<div class="body__content">
<body >
    <div class="main-signup__container">
        <h1 class="log-title">Iniciar Sesión</h1>
        <div class="main-form__container">
            <form action="?C=UserController&M=__login" method="post" name="" id="login" autocomplete="off" class="login-form">
                <div class="">
                    <fieldset class="fieldset__container">
                        <!-- Icono de un candado utilizando SVG -->
                        <svg class="icon-lock" xmlns="http://www.w3.org/2000/svg" 
                        height="1em" 
                        viewBox="0 0 448 512"
                        ><!--! Font Awesome Free 6.4.0 by 
                        @fontawesome - https://fontawesome.com 
                        License - https://fontawesome.com/license 
                        (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 
                        64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 
                        64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                        
                        <div class="form-container">
                            <div class="user__section">
                                <label for="Usuario">Usuario</label><br>
                                <input type="text" name="Usuario" placeholder="Ingrese su Correo Electrónico" id="a" required class="login-username"><br>
                            </div>
                            <div class="password__section">
                                <label for="">Contraseña</label><br>
                                <input type="password" name="pass" placeholder="Ingrese su Contraseña" id="b" required class="login-password"><br>
                            </div>
                            <button class="btn-submit" id="btn" type="submit">Enviar</button>
                            <div class="link__container">
                            <a class="link__register" href="?C=UserController&M=CallFormAdd">Registrarse</a>
                            </div>
                        </div>      
                    </fieldset>
                </div>
                <fieldset class="tip__container">
                    <h3>Compra Artesanias por nuestra tienda online!!!</h3>

                </fieldset>
            </form>
        </div>
        <br>
    </div>
</body>
</div>
</html>