<?php

require_once('database.php');
session_start();

// Establecer conexión con la base de datos
$conexion = conexion();

// Llamar al procedimiento almacenado
$codUser = $_SESSION["user"];
$nom = $_POST["nom"];
$obj = $_POST["obj"];
$acts = $_POST["actividades"]; 
$details = $_POST["details"];
$caracts = $_POST["caracts"];
$cupo = $_POST["cupo"];
$jorn = $_POST["jorn"];
$fi = $_POST["fechaInicio"];
$ff = $_POST["fechaFin"];

$stmt = $conexion->prepare("CALL SAVEss(?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssisss",$codUser,$nom,$obj,$acts,$details,$caracts,$cupo,$jorn,$fi,$ff);

$stmt->execute();

header("location: ../dependencia/NuevaSolicitud/Solicitud.php?requery=true");

// Cerrar la conexión
mysqli_free_result($result);
mysqli_close($conexion);
exit;
?>
