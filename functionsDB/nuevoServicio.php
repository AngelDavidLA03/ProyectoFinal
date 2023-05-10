<?php

require_once('database.php');
session_start();

// Establecer conexión con la base de datos
$conexion = conexion();

// Llamar al procedimiento almacenado
$codUser = $_SESSION["user"];
$nom = $_POST["Titulo"];
$acts = $_POST["actividades"];
$hi = $_POST["horaInicio"];
$hf = $_POST["horaFin"];
$dias = $_POST["diasPorSem"];
$fi = $_POST["fechaInicio"];
$ff = $_POST["fechaFin"];

$stmt = $conexion->prepare("CALL SAVEss(?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssiss",$codUser,$nom,$acts,$hi,$hf,$dias,$fi,$ff);

$stmt->execute();

header("location: ../dependencia/NuevaSolicitud/Solicitud.php?requery=true");

// Cerrar la conexión
mysqli_free_result($result);
mysqli_close($conexion);
exit;
?>
