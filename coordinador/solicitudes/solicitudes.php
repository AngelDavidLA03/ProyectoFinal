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
                   <li><a href="../iniciocoordinador.php">Inicio</a></li>
                   <li><a href="../documentos/documentos.php">Subir documentos</a></li>
                   <li><a href="../alumno/alumno.php">Alumnos en servicio</a></li>
                   <li><a href="../dependencias/dependencias.php">Dependencias Registradas</a></li>
                   <li><a href="../solicitudes/solicitudes.php">Solicitudes</a></li>
                   <li><a href="../../functionsDB/logout.php">Cerrar sesión</a></li>
          </ul>
        </nav>
      </div>
    </header>
  </head>
  <body>

  
  <!-- Contenido de la tabla -->
  <div class="container">
  <h1>Renovar Convenio</h1>

   <!-- Filtro de búsqueda -->
   <div class="search-container">
    <input type="text" id="search-input" placeholder="Buscar por nombre de dependencia">
  </div>

  <table>
    <thead>
      <tr>
        <th>Código Dependencia</th>
        <th>Id Dependencia</th>
        <th>Nombre Dependencia</th>
        <th>RFC</th>
        <th>Calificación</th>
        <th>Tipo</th>
        <th>Convenio</th>
        <th>Aceptar/Rechazar</th>
      </tr>
    </thead>
    <tbody>

    <?php
// Hacer la conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "AdLa20031108", "db_serviciosocial");

// Realizar una consulta a la base de datos
$query = "SELECT d.codUserDepend, d.idDepend, d.nomDepend, d.RFC, d.califDepend, d.tipoDepend, dc.document
          FROM dependencia AS d
          JOIN convenio AS c ON d.idDepend = c.idDependConv
          JOIN documento AS dc ON dc.idDocument = c.idDocumentConv";

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
      <td><?php
                echo "<form id='form-con' action='documento.php' method='post' target='_blank'>";
                echo "<input type='hidden' name='blob' value='" . base64_encode($row["document"]) . "'>";
                echo "<button type='submit'>Convenio</button>";
                echo "</form>"; ?></td>

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

<!-- script abrir pdf en una ventna -->

<script>
function openPdf(blobData) {
  var decodedData = atob(blobData);
  var win = window.open("", "PdfWindow");
  win.document.write("<html><body><embed src='data:application/pdf;base64," + decodedData + "' width='100%' height='100%' type='application/pdf'></embed></body></html>");
}
</script>

<script>
  // Obtener la referencia al input de búsqueda
  const searchInput = document.getElementById('search-input');

  // Obtener la referencia a la tabla
  const table = document.getElementById('table-dependencies');

  // Agregar evento de input al input de búsqueda
  searchInput.addEventListener('input', function() {
    const searchValue = this.value.trim().toLowerCase();

    // Iterar sobre las filas de la tabla y mostrar u ocultar según la búsqueda
    Array.from(table.getElementsByTagName('tbody')[0].getElementsByTagName('tr')).forEach(function(row) {
      const nameColumn = row.getElementsByTagName('td')[2];
      const name = nameColumn.textContent.toLowerCase();

      if (name.includes(searchValue)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
</script>

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
