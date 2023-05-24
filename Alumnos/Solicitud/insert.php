<?php
session_start();

// Verificar si el parámetro 'idServicio' está presente en la URL
if (isset($_GET['idServicio'])) {
  $idServicio = $_GET['idServicio'];

  // Resto del código...

  // Recibir los datos del formulario
  $codUser = $_SESSION["user"];

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

  // Consulta INSERT
  $stmt = $conexion->prepare("INSERT INTO `realizar` (codUserAlumn, idServicio) VALUES (?,?)");
  $stmt->bind_param("ss", $codUser, $idServicio);


  // Ejecutar la consulta
  if ($stmt->execute()) {
      echo "La inserción se realizó correctamente."; echo $codUser;
  } else {
      echo "Error al ejecutar la inserción: " . mysqli_error($conexion);
  }

  // Cerrar conexión
  mysqli_close($conexion);
} else {
  echo "El parámetro 'idServicio' no está presente en la URL.";
}
header("location: ../InicioAlumno/estudiante.php");
exit;
?>
