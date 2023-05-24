<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
    <link rel="stylesheet" type="text/css" href="stylereporte.css">
    
</head>
<body>
<header>
    <div class="header">
        <?php
        session_start();
        require_once 'consulta.php';

        $student_id = $_SESSION['user']; // ID del estudiante que deseas mostrar

        // Obtener nombre completo del estudiante desde la base de datos
        $stmt = $conn->prepare("SELECT nomAlumn, apAlumn, amAlumn FROM alumno WHERE codUserAlumn = :student_id");
        $stmt->bindParam(":student_id", $student_id);
        $stmt->execute();

        // Verificar si se encontró el estudiante
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            $student_name = $row['nomAlumn'];
            $apellido_paterno = $row['apAlumn'];
            $apellido_materno = $row['amAlumn'];

            // Juntar nombre y apellidos en una cadena
            $full_name = $student_name . ' ' . $apellido_paterno . ' ' . $apellido_materno .' ';

            echo '<h2 id="student-name">' . $full_name . '</h2>';
        } else {
            echo '<h2 id="student-name">Estudiante no encontrado</h2>';
        }
        ?>
       <div class="user-menu">
    <a href="#" class="user-icon">
        <?php
        require_once 'consulta.php';

        try {
            $stmt = $conn->prepare("SELECT * FROM alumno WHERE codUserAlumn = :student_id");
            $stmt->bindParam(":student_id", $student_id);
            $student_id = $_SESSION['user'];; // ID del estudiante que deseas mostrar

            $stmt->execute();
            $student = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si se encuentra el estudiante, mostrar sus datos
            if ($student) {
                if (!empty($student['foto'])) {
                    $imageData = $student['foto'];
                    $base64Image = base64_encode($imageData);
                    echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="User">';
                } else {
                    echo '<img src="default.jpg" alt="User">';
                }
            }
        } catch (PDOException $exception) {
            echo '<img src="default.jpg" alt="User">';
        }
        ?>
    </a>
    <ul class="dropdown-menu">
        <li><a href="#" class="menu-option">Perfil</a></li>
        <li><a href="#" class="menu-option">Configuración</a></li>
        <li><a href="..//login/login.html" class="menu-option">Cerrar sesión</a></li>
    </ul>
</div>

</header>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .pdf-container {
            display: flex;
            height: 60%;  /* Reducir la altura para dar espacio a las tarjetas adicionales */
            padding: 20px;
            box-sizing: border-box;
        }

        .pdf-container iframe {
            flex: 1;
            margin-right: 20px;
        }

        .instructions-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            
        }

        .instruction-card {
            background-color: #1d009f8a;
            padding: 10px;
            border-radius: 10px;
            color: white;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            
        }

        .extra-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            padding: 20px;
            box-sizing: border-box;
            
            
        }

        .extra-card {
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 2px 15px #1d009f8a;
            text-align: center;
        }

        .extra-card h3 {
            margin-top: 0;
        }

        .extra-card input[type="file"] {
            margin-top: 20px;
        }

        .upload-display {
            display: none;
            margin-top: 10px;
            border: 1px solid #rgba(0, 51, 102, 0.8);
            padding: 10px;
        }

    </style>


<div class="pdf-container">
    <iframe src="Archivo/formato.pdf" frameborder="0"></iframe>
    <div class="instructions-container">
        <div class="instruction-card">
            <h3>Paso 1. <br>Llena el documento</h3> 
        </div>
        <div class="instruction-card">
            <h3>Paso 2. <br>Descárgalo o guárdalo</h3>
        </div>
        <div class="instruction-card">
            <h3>Paso 3. <br>Súbelo</h3>
        </div>
    </div>
</div>

<div class="extra-cards">
    <div class="extra-card">
        <h3>Nombre del servicio social</h3>
        <p>Aquí se muestra el nombre del servicio social al que estás inscrito.</p>
    </div>

    <div class="extra-card">
    <h3>Subir archivo</h3>
    <p>Aquí puedes subir el archivo relacionado al servicio social.</p>
    <form id="upload-form" action="Subir.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileUpload" id="fileUpload">
        <div id="upload-display" class="upload-display">
            <p>Nombre del archivo: <span id="file-name">N/A</span></p>
        </div>
        <button type="submit" name="submit">Enviar</button>
    </form>
</div>


    
</div>

    </div>
</div></head>
<body>
<style>
        .menu {
            display: flex;
            justify-content: space-around;
            background-color: #1d009f8a;
            padding: 10px 0;
        }

        .menu-button {
            background-color: transparent;
            border: none;
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        .menu-button:hover {
            background-color: #1d009f8a;
            color: white;
        }

        .highlight {
            background-color: #1d009f8a;
            color: white;
        }
    </style>
    <div class="menu">
    <a href="..//InicioAlumno/estudiante.php">   <button class="menu-button">Paso 1. Actualizar datos</button>
    <a href="..//Solicitud/Seleccionarservicio.php">  <button class="menu-button">Paso 2. Seleccionar servicio social</button>
    <a href="#">  <button class="menu-button highlight">Paso 3. Reportes</button>
    </div>


<script>
    document.getElementById('fileUpload').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        document.getElementById('file-name').textContent = fileName;
        document.getElementById('upload-display').style.display = 'block';
    });
</script>
</body>
</html>
