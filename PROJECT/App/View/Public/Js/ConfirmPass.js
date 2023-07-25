 // Función para verificar si las contraseñas coinciden
  function validarContrasena() {
    var contrasena = document.getElementById("c").value;
    var confirmarContrasena = document.getElementById("d").value;

    if (contrasena !== confirmarContrasena) {
      alert("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.");
      return false;
    }
    return true;
  }

  // Asignar la función al evento "submit" del formulario
  document.getElementById("login").addEventListener("submit", validarContrasena);
