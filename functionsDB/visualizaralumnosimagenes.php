<?php
// Obtener el ID del alumno desde la variable POST
$id = $_POST['id'];

// Conectar a la base de datos
$conn = mysqli_connect("localhost","root","AdLa20031108","db_servicioSocial");

// Verificar si hubo un error al conectar
if (mysqli_connect_errno()) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del alumno desde la base de datos
$resultado = mysqli_query($conn, "SELECT * FROM alumno WHERE matricula = $id");
$fila = mysqli_fetch_assoc($resultado);

// Generar la tabla HTML con los detalles del alumno
echo '<table>';
echo '<tr><td>Código Alumno:</td><td>' . $fila["codUserAlumn"] . '</td></tr>';
echo '<tr><td>Matrícula:</td><td>' . $fila["matricula"] . '</td></tr>';
echo '<tr><td>Nombre:</td><td>' . $fila["nomAlumn"] . '</td></tr>';
echo '<tr><td>Apellido Paterno:</td><td>' . $fila["apAlumn"] . '</td></tr>';
echo '<tr><td>Apellido Materno:</td><td>' . $fila["amAlumn"] . '</td></tr>';
echo '<tr><td>Semestre:</td><td>' . $fila["semestre"] . '</td></tr>';
echo '<tr><td>Especialidad:</td><td>' . $fila["especialidad"] . '</td></tr>';
echo '<tr><td>Créditos:</td><td>' . $fila["creditosAcum"] . '</td></tr>';
echo '<tr><td>Localidad:</td><td>' . $fila["localidadAlum"] . '</td></tr>';

echo '</table>';



// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>