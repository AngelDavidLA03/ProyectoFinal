<?php
session_start();
require_once 'consulta.php';

// Verificar si ha alcanzado el límite de modificaciones
if (isset($_SESSION['modification_count']) && $_SESSION['modification_count'] >= 10) {
    // El usuario ya realizó dos modificaciones en los últimos 30 días
    echo '<script>alert("Ya has alcanzado el límite de modificaciones permitidas en los últimos 30 días."); window.location.href = "estudiante.php";</script>';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $student_id = $_SESSION['user'];; // ID del estudiante que deseas actualizar

        if (isset($_POST['new-number']) && !empty($_POST['new-number'])) {
            $new_number = $_POST['new-number'];

            $stmt = $conn->prepare("UPDATE alumno SET numTelfAlumn = :new_number WHERE codUserAlumn = :student_id");
            $stmt->bindParam(":new_number", $new_number);
            $stmt->bindParam(":student_id", $student_id);
            $stmt->execute();
        }

        if (isset($_POST['new-email']) && !empty($_POST['new-email'])) {
            $new_email = $_POST['new-email'];

            $stmt = $conn->prepare("UPDATE alumno SET correo = :new_email WHERE codUserAlumn = :student_id");
            $stmt->bindParam(":new_email", $new_email);
            $stmt->bindParam(":student_id", $student_id);
            $stmt->execute();
        }

        // Actualizar el contador de modificaciones en las variables de sesión
        if (!isset($_SESSION['modification_count'])) {
            $_SESSION['modification_count'] = 1;
        } else {
            $_SESSION['modification_count']++;
        }

        header("Location: estudiante.php"); // Redirigir a la página principal después de la actualización
    } catch (PDOException $exception) {
        echo '<script>alert("No se pudieron actualizar los datos \n Intente de nuevo"); window.location.href = "estudiante.php";</script>';
    }
}
?>
