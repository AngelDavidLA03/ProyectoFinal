<?php
session_start();
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require_once "consulta.php";

    // Preparar la consulta SQL para cada archivo
    $stmt = $conn->prepare("CALL SAVEdocuments(?,?)");

    $student_id = $_SESSION['user']; // ID del estudiante que deseas mostrar
    $mat = preg_replace('/[^0-9]/', '', $student_id);

    // Obtener el archivo constancia
    $constancia = $_FILES["constancia"];
    $datosC = file_get_contents($constancia["tmp_name"]);

    if ($datosC !== null && $constancia["error"] === 0 && $constancia["type"] === "application/pdf" && $constancia["size"] <= 40 * 1024 * 1024) {

        // Insertar los datos en la base de datos para el archivo constancia

        $pref = "CON";

        $stmt->bindParam(1, $datosC, PDO::PARAM_LOB);
        $stmt->bindParam(2, $pref);
        

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];
        $stmt->closeCursor();

        if (!empty($id)) {
            $stmt2 = $conn->prepare("CALL SAVEcon (?,?)");
            $stmt2->execute([$id, $mat]);
            $stmt2->closeCursor(); // Cerrar el conjunto de resultados anterior
            echo "Archivo constancia subido correctamente.";
        } else {
            echo "Error al cargar el archivo constancia.";
        }
    }

    // Obtener el archivo carta de presentación
    $carta = $_FILES["carta"];
    $datosCar = file_get_contents($carta["tmp_name"]);
    if ($datosCar !== null && $carta["error"] === 0 && $carta["type"] === "application/pdf" && $carta["size"] <= 40 * 1024 * 1024) {

        $pref = "CPE";

        $stmt->bindParam(1, $datosCar, PDO::PARAM_LOB);
        $stmt->bindParam(2, $pref);
        

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];
        $stmt->closeCursor();

        if (!empty($id)) {
            $stmt3 = $conn->prepare("CALL SAVEcpe (?,?)");
            $stmt3->execute([$id, $mat]);
            $stmt3->closeCursor(); // Cerrar el conjunto de resultados anterior
            echo "Archivo constancia subido correctamente.";
        } else {
            echo "Error al cargar el archivo constancia.";
        }
    }


    // Obtener el archivo seguro social
    $seguro = $_FILES["seguro"];
    $datosS = file_get_contents($seguro["tmp_name"]);
    if ($datosS !== null && $seguro["error"] === 0 && $seguro["type"] === "application/pdf" && $seguro["size"] <= 40 * 1024 * 1024) {

        $pref = "NSS";
        
        $stmt->bindParam(1, $datosS, PDO::PARAM_LOB);
        $stmt->bindParam(2, $pref);
        

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];
        $stmt->closeCursor();

        if (!empty($id)) {
            $stmt4 = $conn->prepare("CALL SAVEnss (?,?)");
            $stmt4->execute([$id, $mat]);
            $stmt4->closeCursor(); // Cerrar el conjunto de resultados anterior
            echo "Archivo constancia subido correctamente.";
        } else {
            echo "Error al cargar el archivo constancia.";
        }
    }

    // Cerrar la conexión
    $stmt = null;
    $conn = null;

    header("location: estudiante.php");
    
    exit();
}
?>
