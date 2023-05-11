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
$resultado = mysqli_query($conn, "SELECT * FROM dependencia WHERE idDepend = $id");
$fila = mysqli_fetch_assoc($resultado);

// Generar la tabla HTML con los detalles del alumno
echo '<table>';
echo '<tr><td>Código Dependencia:</td><td>' . $fila["codUserDepend"] . '</td></tr>';
echo '<tr><td>Id Dependencia:</td><td>' . $fila["idDepend"] . '</td></tr>';
echo '<tr><td>Nombre:</td><td>' . $fila["nomDepend"] . '</td></tr>';
echo '<tr><td>RFC:</td><td>' . $fila["RFC"] . '</td></tr>';
echo '<tr><td>Calificación:</td><td>' . $fila["califDepend"] . '</td></tr>';
echo '<tr><td>Giro:</td><td>' . $fila["enfoqueDepend"] . '</td></tr>';
echo '<tr><td>Teléfono:</td><td>' . $fila["numTelfDepend"] . '</td></tr>';
echo '<tr><td>Calle:</td><td>' . $fila["calleDepend"] . '</td></tr>';
echo '<tr><td>Tipo:</td><td>' . $fila["tipoDepend"] . '</td></tr>';

echo '</table>';



// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>