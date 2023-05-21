<?php
session_start();
/**/
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "AdLa20031108";
$database = "db_serviciosocial";

$id = (string)$_POST['idServicio'];

$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener las convocatorias desde la base de datos
$sql = "SELECT serviciosocial.idServicio,serviciosocial.nomServic,serviciosocial.objetivo,serviciosocial.actividades,serviciosocial.detalles,serviciosocial.caracteristicas,serviciosocial.cupoLimit,(serviciosocial.cupoLimit - COUNT(realizar.codUserAlumn)) AS cupoDisp,serviciosocial.jornada,serviciosocial.fechaInicio,serviciosocial.fechaFin FROM serviciosocial INNER JOIN realizar ON serviciosocial.idServicio = realizar.idServicio WHERE serviciosocial.idServicio = '$id' AND realizar.estado = 'ACEPTADO';";
$result = $conn->query($sql);

// Generar las opciones del select con los resultados de la consulta
echo "<h2>Detalles</h2>";
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        $idServicio = $row["idServicio"];
        $nomServic = $row["nomServic"];
        $objetivo = $row["objetivo"];
        $actividades = $row["actividades"];
        $detalles = $row["detalles"];
        $caracteristicas  = $row["caracteristicas"];
        $cupoLimit = $row["cupoLimit"];
        $cupoDisp = $row["cupoDisp"];
        $jornada = $row["jornada"];
        $fechaInicio = $row["fechaInicio"];
        $fechaFin = $row["fechaFin"];

        echo "Folio: " . $idServicio . ".<br>";
        echo "Nombre del Programa: " . $nomServic . ".<br>";
        echo "Objetivo: ". $objetivo .".<br>";
        echo "Actividades: " . $actividades . ".<br>";
        echo "Detalles de actividades: " . $detalles . ".<br>";
        echo "Caracteristicas del solicitante: " . $caracteristicas . ".<br>";
        echo "Limitado a: " . $cupoLimit . " alumnos.<br>";
        echo "Espacios disponibles: ".$cupoDisp.".<br>";
        echo "Jornada laboral de: ". $jornada .".<br>";
        echo "Fecha de Inicio: " . $fechaInicio . "<br>";
        echo "Fecha de Fin: " . $fechaFin . "<br>";
    }
  
}