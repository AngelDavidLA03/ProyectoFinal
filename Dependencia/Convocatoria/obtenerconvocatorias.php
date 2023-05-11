<?php
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
  $sql = "SELECT  idServicio, nomServic FROM serviciosocial";
  $result = $conn->query($sql);
  
  // Generar las opciones del select con los resultados de la consulta
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row["id"] . '">' . $row["nomServic"] . '</option>';
    }
  }
  
  // Cerrar la conexión
  $conn->close();
  
?>

