<?php
session_start();
/**/
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "AdLa20031108";
$database = "db_serviciosocial";

$id = (string)$_POST['alumn'];

$temp = preg_replace("/[^0-9]/", "", $id);

$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener las convocatorias desde la base de datos
$sql = "SELECT foto, 
               matricula, 
               nss, 
               CONCAT(nomAlumn,' ',apAlumn,' ',amAlumn) AS nombre, 
               (YEAR(CURDATE()) - YEAR(fechaNac)) AS edad, 
               generoAlumn, 
               especialidad, 
               semestre, 
               localidadAlum, 
               (SELECT document FROM cartapresentacion AS cpe INNER JOIN documento AS d ON d.idDocument = cpe.idDocumentPresent WHERE cpe.matriculaPresent = '$temp') AS con, 
               (SELECT document FROM constancia AS con INNER JOIN documento AS d ON d.idDocument = con.idDocumentConst WHERE con.matriculaConst = '$temp') AS cpe,
               codUserAlumn
               FROM alumno
               WHERE codUserAlumn = '$id';";
$result = $conn->query($sql);

// Generar las opciones del select con los resultados de la consulta
echo "<h2>Informacion del alumno</h2>";
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        $foto = $row["foto"];
        $mat = $row["matricula"];
        $nss = $row['nss'];
        $nom = $row["nombre"];
        $edad = $row["edad"];
        $gen = $row["generoAlumn"];
        $espec = $row["especialidad"];
        $sem = $row["semestre"];
        $ciudad = $row["localidadAlum"];
        $id = $row["codUserAlumn"];
        $con = $row["con"];
        $cpe = $row["cpe"];

        $blobCon = base64_encode($con);
        $blobCpe = base64_encode($cpe);
        $imageData = base64_encode($foto);


        //echo '<img src="data:image/jpeg;base64,' . base64_encode($foto) . '" alt="' . $mat . '">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($foto) . '" alt="' . $mat . '" style="max-width: 125px;">';
        echo "<center>";
        echo $mat . "<br>";
        echo "</center>";
        echo "Nombre: " . $nom . "<br>";
        echo "Edad: " . $edad . "<br>";
        echo "Genero: " . $gen . "<br>";
        echo "Especialidad: " . $espec . "<br>";
        echo "Semestre: " . $sem . "<br>";
        echo "Seguro Social: ".$nss."<br>";
        echo "Localidad: " . $ciudad . "<br>";

        echo "<form id='form-con' action='documento.php' method='post' target='_blank'>";
        echo "<input type='hidden' name='blob' value='" . htmlspecialchars($blobCon) . "'>";
        echo "<button type='submit'>Ver Carta de Presentacion</button>";
        echo "</form>";

        echo "<form id='form-cpe' action='documento.php' method='post' target='_blank'>";
        echo "<input type='hidden' name='blob' value='" . htmlspecialchars($blobCpe) . "'>";
        echo "<button type='submit'>Ver Constancia</button>";
        echo "</form>";

        echo "<button class='aceptar-btn' data-valor='$id'>Aceptar</button>" . "<button class='rechazar-btn' data-valor='$id'>Rechazar</button>";
    }
  
}