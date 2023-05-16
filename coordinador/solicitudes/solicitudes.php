<!DOCTYPE html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Aceptar solicitudes pendientes</title>

    <link rel="stylesheet" type="text/css" href="solicitudes.css">

    
    <header>
      <div class="containers">
        <nav>
          <ul>
                <li><a href="../coordinador.php">Crear cuenta</a></li>
                <li><a href="../documentos/documentos.php">Subir documentos</a></li>
                <li><a href="../alumno/alumno.php">Alumnos en servicio</a></li>
                <li><a href="../dependencias/dependencias.php">Dependencias</a></li>
                <li><a href="../solicitudes/solicitudes.php">Solicitudes</a></li>
                <li><a href="../../login/login.html">Cerrar sesión</a></li>   
          </ul>
        </nav>
      </div>
    </header>
  </head>
  <body>

  
  <!-- Contenido de la tabla -->
  <div class="container">
  <h1>Renovar Convenio</h1>
  <table>
    <thead>
      <tr>
        <th>Código Dependencia</th>
        <th>Id Dependencia</th>
        <th>Nombre Dependencia</th>
        <th>RFC</th>
        <th>Calificación</th>
        <th>Tipo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Hacer la conexión a la base de datos
        $conn = mysqli_connect("localhost", "root", "", "db_serviciosocial");

        // Realizar una consulta a la base de datos
        $query = "SELECT codUserDepend, idDepend, nomDepend, RFC, califDepend, tipoDepend FROM dependencia";
        $result = mysqli_query($conn, $query);

        // Iterar sobre los resultados y mostrarlos en la tabla
        while($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row["codUserDepend"]; ?></td>
              <td><?php echo $row["idDepend"]; ?></td>
              <td><?php echo $row["nomDepend"]; ?></td>
              <td><?php echo $row["RFC"]; ?></td>
              <td><?php echo $row["califDepend"]; ?></td>
              <td><?php echo $row["tipoDepend"]; ?></td>
              <td class="btn-group">
                <button data-procedure="aceptar_convenio">Aceptar</button>
                <button class="reject-btn" data-procedure="rechazar_convenio">Rechazar</button>
              </td>
            </tr>
          <?php
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>

<!-- Botones aceptar y rechazar -->
<script>
  // Seleccionar todos los botones "Aceptar" y "Rechazar"
  var buttons = document.querySelectorAll("button");

  // Recorrer los botones y agregar un evento de clic a cada uno
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function() {
      // Obtener el código de usuario y el código de convenio de la fila correspondiente
      var codUser = this.parentNode.parentNode.cells[0].innerHTML;
      var codigoConv = this.parentNode.parentNode.cells[1].innerHTML;

      // Obtener el nombre del procedimiento almacenado del atributo personalizado del botón
      var procedure = this.getAttribute("data-procedure");

      // Hacer una petición AJAX al servidor para ejecutar el procedimiento almacenado correspondiente
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Mostrar una respuesta al usuario si se ejecuta el procedimiento correctamente
          alert(this.responseText);
        }
      };
      xhttp.open("POST", "../../functionsDB/aceptarsolicitudesdependencia.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("codUser=" + codUser + "&codigoConv=" + codigoConv);
      });
      }

      // Seleccionar todos los botones "Rechazar"
      var rejectButtons = document.querySelectorAll(".reject-btn");

      // Recorrer los botones y agregar un evento de clic a cada uno
      for (var i = 0; i < rejectButtons.length; i++) {
      rejectButtons[i].addEventListener("click", function() {
      // Obtener el código de usuario y el código de convenio de la fila correspondiente
      var codUser = this.parentNode.parentNode.cells[0].innerHTML;
      var codigoConv = this.parentNode.parentNode.cells[1].innerHTML;// Hacer una petición AJAX al servidor para ejecutar el procedimiento almacenado
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Mostrar una respuesta al usuario si se ejecuta el procedimiento correctamente
          alert(this.responseText);
        }
      };
      xhttp.open("POST", "../../functionsDB/rechazarsolicitudesdependencia.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("codUser=" + codUser + "&codigoConv=" + codigoConv);

      });
      }
</script>

  </body>
</html>
