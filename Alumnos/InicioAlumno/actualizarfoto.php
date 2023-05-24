<?php
// Verifica si se ha enviado el formulario
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    require_once 'consulta.php'; // Asegúrate de incluir el archivo de conexión a la base de datos

    $student_id = $_SESSION['user'];; // ID del estudiante al que se le va a actualizar la foto

    // Ruta donde se almacenarán las fotos
    $uploadDir = 'uploads/';

    // Obtén la información de la foto subida
    $photoName = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoSize = $_FILES['photo']['size'];
    $photoType = $_FILES['photo']['type'];

    // Verifica el tipo de archivo (puedes agregar más tipos si es necesario)
    if ($photoType === 'image/jpeg' || $photoType === 'image/png') {
        // Genera un nombre único para la foto
        $photoName = uniqid('photo_') . '.' . pathinfo($photoName, PATHINFO_EXTENSION);

        // Ruta completa donde se guardará la foto
        $uploadPath = $uploadDir . $photoName;

        // Mueve el archivo temporal a la ubicación deseada
        if (move_uploaded_file($photoTmpName, $uploadPath)) {
            // Actualiza el registro del estudiante con la nueva foto en la base de datos
            $stmt = $conn->prepare("UPDATE alumno SET foto = :photo WHERE codUserAlumn = :student_id");
            $stmt->bindParam(":photo", $photoName);
            $stmt->bindParam(":student_id", $student_id);
            $stmt->execute();

            // Redirige al usuario a la página anterior o a donde consideres necesario
            header('Location: informacion_estudiante.php');
            exit();
        
            // Verifica si se ha enviado el formulario
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                require_once 'consulta.php'; // Asegúrate de incluir el archivo de conexión a la base de datos
            
                $student_id = $_SESSION['user'];; // ID del estudiante al que se le va a actualizar la foto
            
                // Ruta donde se almacenarán las fotos
                $uploadDir = 'uploads/';
            
                // Obtén la información de la foto subida
                $photoName = $_FILES['photo']['name'];
                $photoTmpName = $_FILES['photo']['tmp_name'];
                $photoSize = $_FILES['photo']['size'];
                $photoType = $_FILES['photo']['type'];
            
                // Verifica el tipo de archivo (puedes agregar más tipos si es necesario)
                if ($photoType === 'image/jpeg' || $photoType === 'image/png') {
                    // Genera un nombre único para la foto
                    $photoName = uniqid('photo_') . '.' . pathinfo($photoName, PATHINFO_EXTENSION);
            
                    // Ruta completa donde se guardará la foto
                    $uploadPath = $uploadDir . $photoName;
            
                    // Mueve el archivo temporal a la ubicación deseada
                    if (move_uploaded_file($photoTmpName, $uploadPath)) {
                        // Actualiza el registro del estudiante con la nueva foto en la base de datos
                        $stmt = $conn->prepare("UPDATE alumno SET foto = :photo WHERE codUserAlumn = :student_id");
                        $stmt->bindParam(":photo", $photoName);
                        $stmt->bindParam(":student_id", $student_id);
                        $stmt->execute();
            
                        // Redirige al usuario a la página anterior o a donde consideres necesario
                        header('Location: informacion_estudiante.php');
                        exit();
                    } else {
                        echo "Error al mover la foto.";
                    }
                } else {
                    echo "Tipo de archivo no válido. Por favor, sube una imagen JPEG o PNG.";
                }
            } else {
                echo "Error al subir la foto.";
            }
        }}}
            