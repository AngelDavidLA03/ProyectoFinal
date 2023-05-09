<?php
session_start();
// Establecer conexión con la base de datos
$mysqli = new mysqli("localhost:5555", "root", "", "db_serviciosocial");

// Verificar si la conexión se estableció correctamente
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: " . $mysqli->connect_error;
    exit();
}

// Llamar al procedimiento almacenado
$codUser = $_SESSION["user"];
$nom = $_POST["Titulo"];
$acts = $_POST["actividades"];
$hi = $_POST["horaInicio"];
$hf = $_POST["horaFin"];
$dias = $_POST["diasPorSem"];
$fi = $_POST["fechaInicio"];
$ff = $_POST["fechaFin"];

echo $codUser;

if (!$mysqli->query("CALL SAVEss('$codUser', '$nom', '$acts', '$hi', '$hf', $dias, '$fi', '$ff')")) {
    echo "Falló la llamada al procedimiento almacenado: (" . $mysqli->errno . ") " . $mysqli->error;
}

// Cerrar la conexión
$mysqli->close();
?>
