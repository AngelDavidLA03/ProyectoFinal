<?php
session_start(); // Iniciar la sesión

// Obtener el archivo subido
$file = $_FILES['file'];

// Obtener los datos necesarios para los procedimientos almacenados
$matricula = $_SESSION["user"];
$tipoDocument = "PDF";

// Llamar a los procedimientos almacenados mediante una conexión a la base de datos
$mysqli = new mysqli('localhost:5555', 'root', '', 'db_serviciosocial'); // Reemplaza con la configuración correcta de la base de datos

// Verificar la conexión
if ($mysqli->connect_errno) {
    echo "Error en la conexión a la base de datos: " . $mysqli->connect_error;
    exit();
}

// Llamar al procedimiento SAVEdocuments
$stmt2 = $mysqli->prepare("CALL SAVEdocuments(?, ?)");
$stmt2->bind_param("sb", $file['tmp_name'], $tipoDocument);
$stmt2->send_long_data(0, file_get_contents($file['tmp_name']));
$stmt2->execute();
$stmt2->close();

// Obtener el ID del documento insertado
$idDocument = $mysqli->insert_id;

// Llamar al procedimiento SAVErac
$stmt1 = $mysqli->prepare("CALL SAVErac(?, ?)");
$stmt1->bind_param("si", $idDocument, $matricula);
$stmt1->execute();
$stmt1->close();

$mysqli->close();
?>
