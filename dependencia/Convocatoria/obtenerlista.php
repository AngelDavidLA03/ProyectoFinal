<?php
session_start();
/**/
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "AdLa20031108";
$database = "db_serviciosocial";

$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$cod = $_SESSION['user'];

// Consulta para obtener las convocatorias desde la base de datos
$sql = "SELECT serviciosocial.idServicio, serviciosocial.nomServic FROM serviciosocial INNER JOIN solicitar ON serviciosocial.idServicio = solicitar.idServicio INNER JOIN dependencia ON solicitar.codUserDepend = dependencia.codUserDepend WHERE dependencia.codUserDepend = '$cod' ORDER BY serviciosocial.idServicio DESC";
$result = $conn->query($sql);

// Generar las opciones del select con los resultados de la consulta
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $idServicio = $row["idServicio"];
    $nomServic = $row["nomServic"];

    echo '<option value="' . $idServicio . '">';
    echo $nomServic . '<br>';
    echo '</option>';
    
  }
  
}