<?php
session_start(); // Iniciar la sesión

// Obtener los datos necesarios para los procedimientos almacenados
$alumno = (string)$_POST['alumn'];
$id = (string)$_POST['servc'];

// Llamar a los procedimientos almacenados mediante una conexión a la base de datos
$mysqli = new mysqli('localhost', 'root', 'AdLa20031108', 'db_serviciosocial'); // Reemplaza con la configuración correcta de la base de datos

// Verificar la conexión
if ($mysqli->connect_errno) {
    echo "Error en la conexión a la base de datos: " . $mysqli->connect_error;
    exit();
}

// Llamar al procedimiento SAVEdocuments
$stmt2 = $mysqli->prepare("CALL rejectAlumn(?, ?)");
$stmt2->bind_param("ss",$alumno,$id);

$stmt2->execute();
$stmt2->close();

echo "<h2>Informacion del Alumno</h2>";

$mysqli->close();
?>