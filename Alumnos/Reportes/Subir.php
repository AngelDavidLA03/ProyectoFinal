<?php
session_start();
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['fileUpload'];
    $fileName = $file['name'];

    $student_id = $_SESSION['user']; // ID del estudiante que deseas mostrar
    $mat = preg_replace('/[^0-9]/', '', $student_id);

    // Verificar si el archivo es de tipo PDF
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    if (strtolower($fileExtension) !== 'pdf') {
        echo "Error: Solo se permiten archivos PDF.";
        return;
    }
        // Archivo subido exitosamente, guardar información en la base de datos
        require 'consulta.php'; // Reemplaza 'consulta.php' con el nombre de tu archivo de conexión a la base de datos

        $stmt = $conn->prepare("CALL SAVEdocuments(?,?)");

        // Obtener el archivo constancia
        $rac = $_FILES["fileUpload"];
        $datosR = file_get_contents($rac["tmp_name"]);

    if ($datosR !== null && $rac["error"] === 0 && $rac["type"] === "application/pdf" && $rac["size"] <= 40 * 1024 * 1024) {

        // Insertar los datos en la base de datos para el archivo constancia

        $pref = "RAC";

        $stmt->bindParam(1, $datosR, PDO::PARAM_LOB);
        $stmt->bindParam(2, $pref);
        

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];
        $stmt->closeCursor();

        if (!empty($id)) {
            $stmt2 = $conn->prepare("CALL SAVErac (?,?)");
            $stmt2->execute([$id, $mat]);
            $stmt2->closeCursor(); // Cerrar el conjunto de resultados anterior
            echo "Archivo constancia subido correctamente.";
        } else {
            echo "Error al cargar el archivo constancia.";
        }
    }
    header("location: ../InicioAlumno/estudiante.php");
    
    exit();
}
?>

