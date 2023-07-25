<body class="over">
  <!-- Aquí va una tabla con los usuarios -->
  <a class="link" href="?C=UserController&M=CallFormAdd">Agregar un nuevo usuario</a>
  <div style="overflow-x: auto;">
  <table border=1>
    <thead>
      <td>ID</td>
      <td>Nombre</td>
      <td>ApPaterno</td>
      <td>ApMaterno</td>
      <td>Email</td>
      <td>Telefono</td>
      <td>Direccion</td>
      <td>Permisos</td>
    </thead>
    <tbody>
      <?php
      foreach($datos as $dato){
        echo "<tr>";
        echo "<td>" . $dato['ID_Usuario'] . "</td>";
        echo "<td>" . $dato['Nombre'] . "</td>";
        echo "<td>" . $dato['ApPaterno'] . "</td>";
        echo "<td>" . $dato['ApMaterno'] . "</td>";
        echo "<td>" . $dato['Correo_Electronico'] . "</td>";
        echo "<td>" . $dato['Telefono'] . "</td>";
        echo "<td> <button onclick='editarDirec(\"" . $dato['FK_Direccion'] . "\")'>Editar</button><br></td>";
        echo "<td>" . $dato['Permisos'] . "</td>";
        echo "<td> <button onclick='editar(\"" . $dato['ID_Usuario'] . "\")'>Editar</button><br>
        <button onclick='eliminar(\"" . $dato['ID_Usuario'] . "\")'>Eliminar</button> </td>";
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
    //creamos la funcion para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
    function eliminar(id){
      if(confirm("¿Desea eliminar el usuario?")){
        window.location.href="?C=UserController&M=__delete&id=" +id;
        
      }
    }
    //creamos la funcion para editar un usuario por medio de su id
    function editar(id){
      window.location.href='?C=UserController&M=__callFormEdit&id='+ id;
    }
    function editarDirec(id){
      window.location.href='?C=UserController&M=__callFormeditDirecc&id='+ id;
    }
  </script>
  
 
</body>

