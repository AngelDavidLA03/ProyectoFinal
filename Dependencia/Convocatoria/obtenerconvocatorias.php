<?php
session_start();
/**/
// Conexión a la base de datos
$servername = "localhost:5555";
$username = "root";
$password = "";
$database = "db_serviciosocial";

$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener las convocatorias desde la base de datos
$sql = "SELECT idServicio, nomServic, actividades, horaInicio, diasPorSem, horaFin, fechaInicio, fechaFin FROM serviciosocial";
$result = $conn->query($sql);

// Generar las opciones del select con los resultados de la consulta
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $idServicio = $row["idServicio"];
    $nomServic = $row["nomServic"];
    $actividades = $row["actividades"];
    $horaInicio = $row["horaInicio"];
    $diasPorSem = $row["diasPorSem"];
    $horaFin = $row["horaFin"];
    $fechaInicio = $row["fechaInicio"];
    $fechaFin = $row["fechaFin"];

    $_SESSION['idServicio'] = $idServicio;
  $_SESSION['nomServic'] = $nomServic;
  $_SESSION['actividades'] = $actividades;
  $_SESSION['horaInicio'] = $horaInicio;
  $_SESSION['diasPorSem'] = $diasPorSem;
  $_SESSION['horaFin'] = $horaFin;
  $_SESSION['fechaInicio'] = $fechaInicio;
  $_SESSION['fechaFin'] = $fechaFin;
  
    echo '<option value="' . $idServicio . '">';
    echo $nomServic . '<br>';
    echo '</option>';
    
  }
  
}




  

// Cerrar la conexión
$conn->close();


?>
