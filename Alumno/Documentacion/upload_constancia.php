<?php
// Establece los datos de conexión a la base de datos
$servername = "localhost:5555";
$username = "root";
$password = "";
$dbname = "db_serviciosocial";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


// Verifica si se ha enviado un archivo
if(isset($_FILES['constanciaToUpload'])){
    $file = $_FILES['constanciaToUpload'];

    // Obtiene los detalles del archivo
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fechaEntrega = date('Y-m-d');
    $matriculaPresent = "23660000"; /////////////////////////Cambiar por el que se extrae de la bd ////////////////////////////////////////////////////////77


    // Verifica si no hay errores en la subida del archivo
    if($fileError === 0){
        // Genera un nombre único para el archivo utilizando el año actual
        $generatedFileName = $matriculaPresent .++$fileName ;

        // Ruta donde se guardará el archivo subido
        $document = 'DocumentosTemp/' . $generatedFileName;

        // Mueve el archivo a la ubicación deseada
        move_uploaded_file($fileTmpName, $document);

      
// Guarda los datos en la base de datos
$sql = "INSERT INTO documento (idDocument, fechaEntrega, document, tipoDocument) VALUES ('$generatedFileName','$fechaEntrega', '$document', 'pdf')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Archivo subido y guardado en la base de datos correctamente.');</script>";

  // Obtiene el ID del documento insertado
  $documentoID = $conn->insert_id;

  // Cierra la conexión a la base de datos
  $conn->close();
  header("Location: ..//Documentacion/documentacion.php"); 


} else {
  echo "<script>alert('Error al subir archivo ";
}}}
?>
