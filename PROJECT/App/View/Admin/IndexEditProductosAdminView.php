<body class="over">

<!-- Aquí va una tabla con los usuarios -->
  <a class="link" href="?C=ProductoController&M=CallFormpro">Agregar un nuevo producto</a>
  <div style="overflow-x:auto;" class="tblPRODUCTO">
  <table border=1>
    <thead>
      <td>ID</td>
      <td>Nombre</td>
      <td>Vendedor</td>
      <td>Descripcion</td>
      <td>Precio</td>
      <td>Existencias</td>
    </thead>
    <tbody>
      
      <?php
      foreach($datos as $dato){
        echo "<tr>";
        echo "<td>" . $dato['ID_Productos'] . "</td>";
        echo "<td>" . $dato['Nombre'] . "</td>";
        echo "<td>" . $dato['FK_Vendedor'] . "</td>";
        echo "<td>" . $dato['Descripcion'] . "</td>";
        echo "<td>" . $dato['Precio'] . "</td>";
        echo "<td>" . $dato['Existencias'] . "</td>";
        echo "<td> <button onclick='editar(" . $dato['ID_Productos'] . ")'>Editar</button><br>
        <button onclick='eliminar(" . $dato['ID_Productos'] . ")'>Eliminar</button> </td>";
        echo "</tr>";
      }
      ?>
     
    </tbody>
  </table>
  </div>
      <style>
          .link {
            display: block;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            color: #007BFF;
            text-decoration: none;
            text-align: center;
            background-color: #f0f0f0;
            border: 1px solid #007BFF;
            border-radius: 5px;
        }
         body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
          
        }
        .tblPRODUCTO {
            overflow-x: auto;
            
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        
        .link:hover {
            text-decoration: underline;
        }
        button {
            display: block;
            margin: 5px auto;
            padding: 5px 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .over{
          overflow-x: auto;
          ;
        }
        .over{
          overflow-x: auto;
          ;
        }
        
        table{
          transform: scale(1.01);
          overflow-x: visible;
          padding: 20px;
        }
      </style>
  <script>
  function eliminar(id) {
    // Realizar una solicitud AJAX para eliminar el usuario con el ID especificado
    if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
      fetch('?C=ProductoController&M=Delete&id=' + id, {
          method: 'GET'
        })
        .then(response => {
          // Verificar la respuesta del servidor
          if (response.ok) {
            console.log("El producto se eliminó correctamente");
            // Actualizar o recargar la página después de eliminar el producto
            window.location.reload();
          } else {
            console.error("No se pudo eliminar el producto");
          }
        })
        .catch(error => {
          console.error("Error al eliminar el producto:", error);
        });
        
    }
  }
  function editar(id) {
    // Redireccionar a la página de edición del producto con el ID especificado
    window.location.href = '?C=ProductoController&M=CallFormEditpro&id='+id;
    };
   
  
  </script>
</body>