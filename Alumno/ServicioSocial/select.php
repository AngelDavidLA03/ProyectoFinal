<?php
// Configuración de la conexión a la base de datos
$host = "localhost:5555";
$usuario = "root";
$contraseña = "";
$base_de_datos = "db_serviciosocial";

// Conexión a la base de datos
$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

// Verificar conexión
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener datos de la base de datos
$consulta = "SELECT * FROM serviciosocial";
$resultados = mysqli_query($conexion, $consulta);

// Generar tarjetas dinámicamente
while ($fila = mysqli_fetch_assoc($resultados)) {
  echo '<div class="service-card">';
  echo '<h3>' . $fila['Titulo'] . '</h3>';
  echo '<p><span>Hora de inicio:</span> ' . $fila['horaInicio'] . '</p>';
  echo '<p><span>Días por semana:</span> ' . $fila['diasPorSem'] . '</p>';
  echo '<p><span>Fecha de inicio:</span> ' . $fila['fechaInicio'] . '</p>';
  echo '<p><span>Actividades:</span> ' . $fila['actividades'] . '</p>';
  echo '<p><span>Hora de fin:</span> ' . $fila['horaFin'] . '</p>';
  echo '<p><span>Fecha de fin:</span> ' . $fila['fechaFin'] . '</p>';
  echo '<a href="#" class="postularme-btn">Postularme</a>';
  echo '</div>';
}

// Cerrar conexión
mysqli_close($conexion);
?>
