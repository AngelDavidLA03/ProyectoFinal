<?php
    session_start();
    // Verificar si se recibió un archivo válido
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) 
    {
        // Obtener los datos del archivo
        $archivo = $_FILES["file"]["tmp_name"];
        $tipo = "NRE";

        $mysqli = new mysqli('localhost', 'root', 'AdLa20031108', 'db_serviciosocial'); // Reemplaza con la configuración correcta de la base de datos

        $datos = file_get_contents($archivo);
    
        // Conexión a la base de datos
        $stmt = $mysqli->prepare("CALL  SAVEdocuments(?,?)");
        $stmt->bind_param("ss",$datos,$tipo);
        
        // Ejecutar la consulta
        $stmt->execute();

        $result = $stmt->get_result();

        $getConsulta = array();

        // Se introducen todos los valores dentro del array vacio
        while ($fila = mysqli_fetch_array($result, MYSQLI_NUM)) 
        {
            $getConsulta = $fila;
        }

        $cod = $getConsulta[0];
        $stmt->close();

        $idDir = $_SESSION['idDir'];

        $stmt2 = $mysqli->prepare("CALL  SAVEnre(?,?)");
        $stmt2->bind_param("ss",$cod,$idDir);

        $stmt2->execute();

        // Cerrar el segundo statement
        $stmt2->close();

        // Cerrar la conexión
        $mysqli->close();
        // Devolver la respuesta como JSON
        echo "Se subio el archivo";
        header("location: iniciodependencia.php?redirect=2");
        exit();
    }
?>