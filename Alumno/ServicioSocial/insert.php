<?php
session_start();

// Verificar si el parámetro 'idServicio' está presente en la URL
if (isset($_GET['idServicio'])) {
  $idServicio = $_GET['idServicio'];

  // Resto del código...

  // Recibir los datos del formulario
  $codUser = $_SESSION["user"];
  $estado = 'rechazado';

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

  // Consulta INSERT
  $consulta = "INSERT INTO `realizar` (`codUserAlumn`, `idServicio`, `estado`) VALUES ('2366ALU0010', '$idServicio', '$estado')";

  // Ejecutar la consulta
  if (mysqli_query($conexion, $consulta)) {
      echo "La inserción se realizó correctamente.";
  } else {
      echo "Error al ejecutar la inserción: " . mysqli_error($conexion);
  }

  // Cerrar conexión
  mysqli_close($conexion);
  exit; // Terminar el script después de procesar la solicitud de inserción
} else {
  echo "El parámetro 'idServicio' no está presente en la URL.";
  exit;
}
?>
