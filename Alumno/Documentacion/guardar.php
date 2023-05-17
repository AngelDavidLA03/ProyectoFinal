<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "AdLa20031108";
$dbname = "db_serviciosocial";

// Obtener el archivo subido
$file = $_FILES['file'];

// Obtener los detalles del archivo
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileError = $file['error'];

if ($fileError === UPLOAD_ERR_OK) {
  // Mover el archivo a una ubicación deseada
  $uploadPath = '/ruta/deseada/' . $fileName;  // Especifica la ruta donde deseas guardar el archivo
  move_uploaded_file($fileTmpName, $uploadPath);

  // Guardar la información del archivo en la base de datos
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
  }

  // Query para insertar el archivo en la tabla correspondiente
  $sql = "INSERT INTO documentos (nombre_archivo, ruta_archivo) VALUES ('$fileName', '$uploadPath')";

  if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Documento guardado con éxito']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error al guardar el documento: ' . $conn->error]);
  }

  $conn->close();
} else {
  echo json_encode(['success' => false, 'message' => 'Error al subir el archivo']);
}
?>
