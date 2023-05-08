
<?php
// Realizar la conexión a la base de datos
$servername = "localhost:5555";
$username = "root";
$password = "";
$dbname = "db_serviciosocial";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si se han enviado datos mediante el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario
    $nomServic = $_POST["idServicio"];
    $actividades = $_POST["actividades"];
    $horaInicio = $_POST["horaInicio"];
    $diasPorSem = $_POST["diasPorSem"];
    $horaFin = $_POST["horaFin"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

    // Crear la sentencia SQL para insertar los datos
    $sql = "INSERT INTO servicioSocial (nomServic, actividades, horaInicio, diasPorSem, horaFin, fechaInicio, fechaFin) VALUES ('$nomServic', '$actividades', '$horaInicio', '$diasPorSem', '$horaFin', '$fechaInicio', '$fechaFin')";

    if ($conn->query($sql) === TRUE) {
        echo "Los datos han sido insertados correctamente";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

$conn->close();
?>

