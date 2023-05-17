<?php
session_start();
/**/
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "AdLa20031108";
$database = "db_serviciosocial";

$id = (string)$_POST['alumn'];

$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener las convocatorias desde la base de datos
$sql = "SELECT foto, matricula, CONCAT(alumno.nomAlumn,' ',alumno.apAlumn,' ',alumno.amAlumn) AS nombre, (YEAR(CURDATE()) - YEAR(fechaNac)) AS edad, generoAlumn, especialidad, semestre, localidadAlum, codUserAlumn FROM alumno WHERE codUserAlumn = '$id'";
$result = $conn->query($sql);

// Generar las opciones del select con los resultados de la consulta
echo "<h2>Informacion del alumno</h2>";
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        $foto = $row["foto"];
        $mat = $row["matricula"];
        $nom = $row["nombre"];
        $edad = $row["edad"];
        $gen = $row["generoAlumn"];
        $espec = $row["especialidad"];
        $sem = $row["semestre"];
        $ciudad = $row["localidadAlum"];
        $id = $row["codUserAlumn"];

        $imageData = base64_encode($foto);


        //echo '<img src="data:image/jpeg;base64,' . base64_encode($foto) . '" alt="' . $mat . '">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($foto) . '" alt="' . $mat . '" style="max-width: 300px;">';
        echo $mat . "<br>";
        echo "Nombre: " . $nom . "<br>";
        echo "Edad: " . $edad . "<br>";
        echo "Genero: " . $gen . "<br>";
        echo "Especialidad: " . $espec . "<br>";
        echo "Semestre: " . $sem . "<br>";
        echo "Localidad: " . $ciudad . "<br>";

        echo "<button class='aceptar-btn' data-valor='$id'>Aceptar</button>";
        echo "<button class='rechazar-btn' data-valor='$id'>Rechazar</button>";
    }
  
}