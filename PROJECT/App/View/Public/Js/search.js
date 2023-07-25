// Esperamos a que todos los elementos de la página estén cargados
document.addEventListener('DOMContentLoaded', function() {
  // Obtenemos el input de búsqueda
  var inputBusqueda = document.querySelector('.main-header__input');

  // Obtenemos todos los elementos de productos
  var elementosProductos = document.querySelectorAll('.contenedor-items .item');

  // Agregamos el evento input al input de búsqueda
  inputBusqueda.addEventListener('input', function(event) {
      var textoBusqueda = event.target.value.toLowerCase(); // Obtenemos el texto de búsqueda en minúsculas

      // Recorremos los elementos de productos y los ocultamos o mostramos según el texto de búsqueda
      elementosProductos.forEach(function(producto) {
          var tituloProducto = producto.querySelector('.titulo-item').innerText.toLowerCase();

          // Verificamos si el título del producto contiene el texto de búsqueda
          if (tituloProducto.includes(textoBusqueda)) {
              // Mostramos el producto con una transición suave
              producto.style.opacity = '1';
              producto.style.pointerEvents = 'auto';
          } else {
              // Ocultamos el producto con una transición suave
              producto.style.opacity = '0';
              producto.style.pointerEvents = 'none';
          }
      });
  });
});