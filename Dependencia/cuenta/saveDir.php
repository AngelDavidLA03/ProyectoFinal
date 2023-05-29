<?php
session_start();
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtener los valores enviados
  $codigouser = $_POST['codigouserdir'];
  $nom = $_POST['nomdir'];
  $ap = $_POST['appatdir'];
  $am = $_POST['apmatdir'];
  $edad = $_POST['edaddir'];
  $curp = $_POST['curodir'];
  $email = $_POST['emaildir'];
  $telf = $_POST['teldir'];
  
  $_SESSION['user'] = $codigouser;
  // Conexión a la base de datos
  $mysqli = new mysqli('localhost', 'u611167522_root', 'G3nU1n4M3nT3{]?_', 'u611167522_db_serviciosoc'); // Reemplaza con la configuración correcta de la base de datos

  // Verificar la conexión
  if ($mysqli->connect_errno) {
    echo "Error en la conexión a la base de datos: " . $mysqli->connect_error;
    exit();
  }

  // Consulta preparada para el INSERT
  $stmt = $mysqli->prepare("CALL insertDirectorGen(?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssisss", $codigouser, $nom, $ap, $am, $edad, $curp, $email, $telf);

  $stmt->execute();

  $result = $stmt->get_result();

  $getConsulta = array();

  // Se introducen todos los valores dentro del array vacio
  while ($fila = mysqli_fetch_array($result, MYSQLI_NUM)) 
  {
    $getConsulta = $fila;
  }

  $_SESSION['idDir'] = $getConsulta[0];
  $_SESSION['curp'] = $curp;

  // Cerrar el primer statement
  $stmt->close();

  // Crear el segundo statement para insertar en la tabla usuario
  $passPref = "123456789";
  $tipo = "DEPENDENCIA";

  $stmt2 = $mysqli->prepare("INSERT INTO `usuario` (`codUser`, `email`, `pass`, `tipoUser`) VALUES (?, ?, ?, ?)");
  $stmt2->bind_param("ssss", $codigouser, $email, $passPref, $tipo);

  $stmt2->execute();

  // Cerrar el segundo statement
  $stmt2->close();

  // Cerrar la conexión
  $mysqli->close();
}
?>