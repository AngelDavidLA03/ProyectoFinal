<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require_once "consulta.php";

    // Preparar la consulta SQL para cada archivo
    $stmt = $conn->prepare("INSERT INTO documento (idDocument, fechaEntrega, document, tipoDocument) VALUES (?, ?, ?, ?)");

    // Obtener la fecha actual
    $fechaEntrega = date("Y-m-d");

    // Obtener el archivo constancia
    $constancia = $_FILES["constancia"];
    if ($constancia["error"] === 0 && $constancia["type"] === "application/pdf" && $constancia["size"] <= 40 * 1024 * 1024) {
        // Generar el idDocument para constancia
        $constanciaId = "Constancia_" . $fechaEntrega;

        // Mover el archivo a la ubicación deseada (cambia la ruta según tus necesidades)
        $constanciaPath = "documentos/" . basename($constancia["name"]);
        move_uploaded_file($constancia["tmp_name"], $constanciaPath);
        
        // Insertar los datos en la base de datos para el archivo constancia
        $stmt->execute([$constanciaId, $fechaEntrega, $constanciaPath, "pdf"]);
        echo "Archivo constancia subido correctamente.";
    } else {
        echo "Error al cargar el archivo constancia.";
    }

    // Obtener el archivo carta de presentación
    $carta = $_FILES["carta"];
    if ($carta["error"] === 0 && $carta["type"] === "application/pdf" && $carta["size"] <= 40 * 1024 * 1024) {
        // Generar el idDocument para carta de presentación
        $cartaId = "Carta_" . $fechaEntrega;

        // Mover el archivo a la ubicación deseada (cambia la ruta según tus necesidades)
        $cartaPath = "documentos/" . basename($carta["name"]);
        move_uploaded_file($carta["tmp_name"], $cartaPath);
        
        // Insertar los datos en la base de datos para el archivo carta de presentación
        $stmt->execute([$cartaId, $fechaEntrega, $cartaPath, "pdf"]);
        echo "Archivo carta de presentación subido correctamente.";
    } else {
        echo "Error al cargar el archivo carta de presentación.";
    }

    // Obtener el archivo seguro social
    $seguro = $_FILES["seguro"];
    if ($seguro["error"] === 0 && $seguro["type"] === "application/pdf" && $seguro["size"] <= 40 * 1024 * 1024) {
        // Generar el idDocument para seguro social
        $seguroId = "Seguro_" . $fechaEntrega;

        // Mover el archivo a la ubicación deseada (cambia la ruta según tus necesidades)
        $seguroPath = "documentos/" . basename($seguro["name"]);
        move_uploaded_file($seguro["tmp_name"], $seguroPath);
        
        // Insertar los datos en la base de datos para el archivo seguro social
        $stmt->execute([$seguroId, $fechaEntrega, $seguroPath, "pdf"]);
        echo "Archivo seguro social subido correctamente.";
    } else {
        echo "Error al cargar el archivo seguro social.";
    }
    
    // Cerrar la conexión
    $stmt = null;
    $conn = null;
}
?>
