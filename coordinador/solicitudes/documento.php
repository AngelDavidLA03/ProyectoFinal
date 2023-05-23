<?php
// Obtener el BLOB del campo de entrada POST
$blob = $_POST['blob'];

// Crear un nombre de archivo temporal único
$tempFileName = tempnam(sys_get_temp_dir(), 'pdf_');

// Decodificar el BLOB y escribirlo en el archivo temporal
file_put_contents($tempFileName, base64_decode($blob));

// Configurar las cabeceras para indicar el tipo de archivo
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=archivo.pdf"); // Puedes cambiar el nombre del archivo si lo deseas

// Mostrar el contenido del archivo temporal
readfile($tempFileName);

// Eliminar el archivo temporal después de mostrarlo
unlink($tempFileName);
?>
