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
$sql = "SELECT idServicio,nomServic,actividades,horaInicio,diasPorSem,horaFin,fechaInicio,fechaFin FROM serviciosocial WHERE idServicio = '$id'";
$result = $conn->query($sql);

// Generar las opciones del select con los resultados de la consulta
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        $idServicio = $row["idServicio"];
        $nomServic = $row["nomServic"];
        $actividades = $row["actividades"];
        $horaInicio = $row["horaInicio"];
        $diasPorSem = $row["diasPorSem"];
        $horaFin = $row["horaFin"];
        $fechaInicio = $row["fechaInicio"];
        $fechaFin = $row["fechaFin"];

        echo "Identificador: " . $idServicio . "<br>";
        echo "Nombre de Servicio: " . $nomServic . "<br>";
        echo "Actividades: " . $actividades . "<br>";
        echo "Hora de Inicio: " . $horaInicio . "<br>";
        echo "Días por Semana: " . $diasPorSem . "<br>";
        echo "Hora de Fin: " . $horaFin . "<br>";
        echo "Fecha de Inicio: " . $fechaInicio . "<br>";
        echo "Fecha de Fin: " . $fechaFin . "<br>";
    }
  
}