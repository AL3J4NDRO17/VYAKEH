<link rel="stylesheet" href="App/View/Public/Css/Shop.css">
<div class="shop__container">
    <body class="container__shop">  
        <div class="description content">
            <section class="contenedor">
                <!-- Contenedor de elementos -->
                <div class="mensaje-compra-completada" id="mensajeCompraCompletada">
                <p>---------SU COMPRA SE HA REALIZADO CON EXITO!!!!!!----------</p>
</div>
                <?php
                foreach ($datos as $dato) {
                    echo '<div class="contenedor-items">';
                    echo '<div class="item">';
                    echo '<span class="titulo-item">' . $dato['Nombre'] . '</span>';
                    echo '<div class="image-container">';
                    echo '<img class="img-item" src="App/View/Public/Resources/ProductImage/' . $dato['Img_Product'] . '" alt=""></img>';
                    echo '</div>';
                    echo '<span class="precio-item">$' . $dato['Precio'] . '</span>';
                    echo '<button class="boton-descripcion">Mostrar Descripción</button>';
                    echo '<div class="descripcion-detalle">' . $dato['Descripcion'] . '</div>';
                    echo '<h4 class="existencias">Existencias:' . $dato['Existencias'] . '</h4>';
                    if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                        // Mostrar el botón con el efecto
                        echo '<button class="boton-item">Agregar al Carrito</button>';
                    } else {
                        // Redirigir a otro sitio (por ejemplo, formulario de inicio de sesión)
                        echo "<button onclick='mensaje()'>Agregar al Carrito</button>";
        
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                <script>
                    function mensaje(){
                        alert("Debe estar logueado para realizar dicha accion")
                    }
                    
                </script>
                
                <!-- ... (código HTML y CSS) ... -->

<!-- Carrito de Compras -->
<div class="carrito" id="carrito">
    <div class="header-carrito">
        <h2>Tu Carrito</h2>
    </div>

    <div class="carrito-items"> <!-- dentro de este contenedor se encontrará la imagen del producto que llamaremos -->

    </div>
    <div class="carrito-total">
        <div class="fila">
            <strong>Tu Total</strong>
            <span class="carrito-precio-total">
                $0,00
            </span>
        </div>
        <button class="btn-pagar">Pagar</button>
    </div>
</div>


        </div>
        <style>
              body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
              }
            .contenedor-items {
                display: flex;
                align-items: center; /* Alinear verticalmente los elementos */
                margin-bottom: 20px; /* Espacio entre elementos */
                padding: auto;
            }

            .item {
                display: flex;
                flex-direction: column;
                align-items: center; /* Alinear verticalmente los elementos dentro de item */
            }

            .descripcion-detalle {
                display: none;
                padding: 10px; /* Agregar un poco de espacio alrededor de la descripción */
                border: 1px solid #ccc; /* Borde alrededor de la descripción */
                max-width: 400px; /* Ancho máximo de la descripción */
                overflow: hidden; /* Ocultar contenido adicional */
            }

            .descripcion-detalle.mostrar {
                display: block;
            }

            .boton-descripcion {
                cursor: pointer;
            }

            .image-container {
                max-width: 200px; /* Tamaño máximo de la imagen */
                max-height: 200px;
                overflow: hidden; /* Ocultar contenido adicional */
                border: 1px solid #ccc; /* Borde alrededor de la imagen */
            }

            .image-container img {
                width: 100%; /* Ajustar el tamaño de la imagen al contenedor */
                height: auto; /* Mantener la proporción original */
            }
        </style>
        <script>
            const botonesDescripcion = document.querySelectorAll(".boton-descripcion");

            botonesDescripcion.forEach((boton) => {
                boton.addEventListener("click", () => {
                    const descripcionDetalle = boton.nextElementSibling;
                    descripcionDetalle.classList.toggle("mostrar");
                    const textoBoton = boton.textContent;
                    boton.textContent = textoBoton === "Mostrar Descripción" ? "Ocultar Descripción" : "Mostrar Descripción";
                });
            });

        </script>
    </body>
</div>