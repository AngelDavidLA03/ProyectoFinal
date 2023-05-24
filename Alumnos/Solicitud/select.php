<?php

// Configuración de la conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contraseña = "AdLa20031108";
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
//  $idServicio = $fila['idServicio']; // Almacena el ID de servicio en una variable

$idServicio = $fila['idServicio'];

  echo '<div class="service-card">';
  echo '<h3>Se solicita: ' . $fila['nomServic'] . '</h3>';
  echo '<p><span>Objetivos:</span> ' . $fila['objetivo'] . '</p>';
  echo '<p><span>Actividades:</span> ' . $fila['actividades'] . '</p>';
  echo '<p><span>Detalles:</span> ' . $fila['detalles'] . '</p>';
  echo '<p><span>Caracteriticas:</span> ' . $fila['caracteristicas'] . '</p>';
  echo '<p><span>Fecha de inicio:</span> ' . $fila['fechaInicio'] . '</p>';
  echo '<p><span>Fecha de fin:</span> ' . $fila['fechaFin'] . '</p>';
  echo '<p><span>Jornada:</span> '  . $fila['jornada'] . '</p>';

  // Pregunta si está de acuerdo antes de mostrar el enlace
  echo '<p>¿Está de acuerdo? ';
  echo '<a href="insert.php?idServicio=' . $idServicio . '&acuerdo=true">Sí</a> ';
  echo '<a href="insert.php?idServicio=' . $idServicio . '&acuerdo=false">No</a></p>';

  echo '</div>';
}

// Cerrar conexión
mysqli_close($conexion);
?>
