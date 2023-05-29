<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "u611167522_root", "G3nU1n4M3nT3{]?_", "u611167522_db_serviciosoc");

// Obtener los parámetros de la petición AJAX
$codUser = $_POST["codUser"];
$codigoConv = $_POST["codigoConv"];

// Ejecutar el procedimiento almacenado
$stmt = $conexion->prepare("CALL acceptDepend(?,?)");
$stmt->bind_param("ss",$codUser,$codigoConv);

$stmt->execute();

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Enviar una respuesta al cliente
echo "El registro se ha aceptado correctamente.";
?>

