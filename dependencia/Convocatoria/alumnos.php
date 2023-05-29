<?php
session_start();
/**/
// Conexión a la base de datos
$servername = "localhost";
$username = "u611167522_root";
$password = "G3nU1n4M3nT3{]?_";
$database = "u611167522_db_serviciosoc";

$id = (string)$_POST['idServicio'];

$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener las convocatorias desde la base de datos
$sql = "SELECT alumno.codUserAlumn, alumno.matricula, CONCAT(alumno.nomAlumn,' ',alumno.apAlumn,' ',alumno.amAlumn) AS nombre FROM alumno INNER JOIN realizar ON alumno.codUserAlumn = realizar.codUserAlumn INNER JOIN serviciosocial ON realizar.idServicio = serviciosocial.idServicio WHERE realizar.idServicio = '$id' AND realizar.estado IS NULL";
$result = $conn->query($sql);

// Generar las opciones del select con los resultados de la consulta
echo "<h2>Solicitud de alumnos</h2>";
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        $cod = $row["codUserAlumn"];
        $mat = $row["matricula"];
        $nom = $row["nombre"];
        
        echo "Matricula: " . $mat . "<br>";
        echo "Nombre: " . $nom . "<br>";
        echo "<button class='btnAlumn' data-valor='$cod'>VER MAS</button>";
    }
  
}