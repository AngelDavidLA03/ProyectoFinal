<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['fileUpload'];
    $fileName = $file['name'];
    $tmpFilePath = $file['tmp_name'];
    
    // Verificar si el archivo es de tipo PDF
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    if (strtolower($fileExtension) !== 'pdf') {
        echo "Error: Solo se permiten archivos PDF.";
        return;
    }

    // Guardar el archivo en una ubicación deseada
    $uploadDirectory = 'Archivo/';
    $destination = $uploadDirectory . $fileName;

    if (move_uploaded_file($tmpFilePath, $destination)) {
        // Archivo subido exitosamente, guardar información en la base de datos
        require 'consulta.php'; // Reemplaza 'consulta.php' con el nombre de tu archivo de conexión a la base de datos

        // Obtener la fecha actual
        $fechaEntrega = date('Y-m-d'); // Opcionalmente, puedes cambiar el formato de fecha según tus necesidades

        // Realizar la inserción en la base de datos
        $query = "INSERT INTO documento (fechaEntrega, document) VALUES ('$fechaEntrega', '$fileName')"; // Reemplaza 'documento' con el nombre de tu tabla en la base de datos

        if ($conn->query($query) === TRUE) {
            echo "Archivo guardado en la base de datos correctamente.";
        } else {
            echo "Error al guardar el archivo en la base de datos: " . $conn->error;
        }

        // Cierra la conexión a la base de datos
        $conn->close();
    } else {
        echo "Error al mover el archivo a la ubicación deseada.";
    }
}
?>

