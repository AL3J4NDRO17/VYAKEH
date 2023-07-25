<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="App/View/Public/Css/estilos.css">
    
</head>
<body>
<header class="main-header">
    <div class="container container--flex">
        <div class="main-header__container">
            <div class="section__title">
        <!-- Titulo --><h1 class="__title">‎ ‎‎ ARTESANIAS</h1>
            </div>
        <span class="icon-menu"  id="btn-menu"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></span>
            <nav class="main-nav" id="main-nav">
                <ul class="menu" id="__menu">
                    <li class="menu__item"><a href="?C=IndexPublicView&M=index" class="menu__link">Inicio</a></li>
                    <li class="menu__item"><a href="?C=ObMeController&M=index" class="menu__link">Nosotros</a></li>
                    <li class="menu__item"><a href="?C=ShopController&M=index" class="menu__link">Tienda</a></li>
                    <li class="menu__item"><a href="?C=ContactController&M=index" class="menu__link">Contacto</a></li>
                    <li class="menu__item"><a href="?C=PoliMeController&M=index" class="menu__link">Politicas</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-header__container">
            <!-- <img class="logo__container" src="App\View\Public\Resources\logo.png" alt=""> -->
            
            <?php
                             if (!isset($_SESSION))
                             session_start();
                            if (isset ($_SESSION ['logedin'] ) && $_SESSION ['logedin']){
                                echo '<li class="main-header__txt"><a href="?C=UserController&M=__login_out"
                                class="linkout">Cerrar Sesion </a></li>';
                            }
                            else{
                                echo '<h2 class="main-header__txt"><!-- Sobre la Empresa --><a href="?C=UserController&M=CallFormLogin" >Iniciar Sesion</a></h2>';
                                
                                echo '<h2 class="main-header__txt"><!-- Contacto de la empresa --><a href="?C=UserController&M=CallFormAdd">Registrarse </a></h2>';
                            

                            }
                           
                   
                            ?>
        </div>
        <div class="main-header__container">
            <svg  class="" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>   
            <a  class="main-header__btn">ShopCar<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></a>
            <input type="search" class="main-header__input" placeholder="Buscar Productos"> 
        </div>
    </div>
</header>
    <?php include_once($vista);?>
    <script src="App/View/Public/Js/slider.js"></script>
    <script src="App/View/Public/Js/menu.js"> </script>
</body>
<div>
<footer class="rights__deserved">
    <h3 class="tittle_deserved">DERECHOS RESERVADOS</h3>
<footer>
    <footer class="main-footer">
    <div class="footer__section">
        <h2 class="footer__title">Sobre Nosotros</h2>
        <p class="footer__txt">Giro: V-YAKE es una página web que actúa como intermediario para que personas puedan anunciarse con su negocio y otras puedan comprar los productos anunciados, por lo que se clasifica como servicio.
Tamaño: V-YAKE es una microempresa, tiene menos de 20 empleados.
Ubicación: C. Cuauhtémoc 389, Centro, 43000 Huejutla, Hgo.
</p>
    </div>
    <div class="footer__section">
        <h2 class="footer__title">Ubicacion:</h2>
        <p class="footer__txt">Huejutla de Reyes Hidalgo</p>
        <h2 class="footer__title">Contact</h2>
        <p class="footer__txt">Telefono: +52 7712155993</p>
        <p class="footer__txt">Correo: jesus.alexem@gmail.com</p>
    </div>
    
    <script src="App/View/Public/Js/menu.js"> </script>
    <script src="App/View/Public/Js/search.js"></script>
    <script src="App/View/Public/Js/shopcar.js"></script>
    <script src="App/View/Public/Js/ConfirmPass.js"></script>
    
    </div>
    <style>
        .linkout{
            color:black
        }
    </style>
</body>