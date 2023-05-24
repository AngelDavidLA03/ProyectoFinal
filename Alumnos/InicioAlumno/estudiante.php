<!DOCTYPE html>
<html>
<head>
    <title>Información del Estudiante</title>
    <link rel="stylesheet" href="styleestudiate.css">
    <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
  <?php
        session_start();

        // Se comprueba si el Coordinador ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "ALUMNO"))
        {
            header("location: ../login/login.html?redirect=true");
            session_destroy();
            exit;
        } 
    ?>
</head>
<body>
<header>
    <div class="header">
        <?php
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
        <li><a href="../../functionsDB/logout.php" class="menu-option">Cerrar sesión</a></li>
    </ul>
</div>

</header>
  

  

    <style>
        .student-image {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .student-image:hover .edit-button {
            display: block;
        }

        .edit-button {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            background-color: transparent;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
    </style>


<body>
  
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
            ?>
            <div class="student-image">
                <?php
                if (!empty($student['foto'])) {
                    $imageData = $student['foto'];
                    $base64Image = base64_encode($imageData);
                    echo '<img id="student-image" src="data:image/jpeg;base64,' . $base64Image . '" alt="Imagen del Estudiante">';
                } else {
                    echo '<img id="student-image" src="default.jpg" alt="Imagen del Estudiante">';
                }
                ?>
                <button id="update-photo-button" class="edit-button" onclick="subirFoto()">Actualizar foto</button>
            </div>
            
           
            <div class="content-below-menu">

            <div class="student-info aaa">
            <p id="student-control-number" class="ss">Número de Control: <?php echo $student['matricula']; ?></p>
            <h2 id="student-name">Nombre del Estudiante: <?php echo $student['nomAlumn'] . ' ' . $student['apAlumn'] . ' ' . $student['amAlumn']; ?></h2>
            <p id="student-career">Carrera: <?php echo $student['especialidad']; ?></p>
            <p id="student-semestre">Semestre: <?php echo $student['semestre']; ?></p>
            <p id="student-ssn">Número de Seguro Social: <?php echo $student['nss']; ?></p>
            <p id="student-number">Número de Teléfono: <?php echo $student['numTelfAlumn']; ?></p>
            <p id="student-email">Correo Electrónico: <?php echo $student['emailPers']; ?></p>
            <button onclick="toggleEditForm()">Actualizar datos</button>

                <div id="edit-form" style="display: none;">
                    <h3>Editar Información</h3>

                    <form method="POST" action="actualizar.php">
    <label for="new-number">Nuevo Número de Teléfono (10 dígitos):</label><br>
    <input type="text" id="new-number" name="new-number" pattern="[0-9]{10}" maxlength="10" ><br>
    <label for="new-email">Nuevo Correo Electrónico:</label><br>
    <input type="email" id="new-email" name="new-email"><br>
    <button type="submit">Actualizar</button>
</form>

                </div>
            </div>
            </div>
            </div>
            <div class="document-upload aaa">
                <h3>Subir Documentos</h3>
                <form method="POST" action="subirarchivos.php" enctype="multipart/form-data">
                   <label for="constancia">Constancia:</label><br>
              <input type="file" id="constancia" name="constancia" accept=".pdf" required><br>
                  <label for="carta">Carta de Presentación:</label><br>
                  <input type="file" id="carta" name="carta" accept=".pdf" required><br>
                 <label for="seguro">Seguro Social:</label><br>
                 <input type="file" id="seguro" name="seguro" accept=".pdf" ><br>
                 <button type="submit">Subir Documentos</button>
                     </form>

            </div>  </div>
   
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
    <a href="#">   <button class="menu-button highlight">Paso 1. Actualizar datos</button>
    <a href="../Solicitud/Seleccionarservicio.php">  <button class="menu-button">Paso 2. Seleccionar servicio social</button>
    <a href="../Reportes/reporte.php">  <button class="menu-button">Paso 3. Reportes</button>
    </div>

            <?php
        } else {
            echo "No se encontró información del estudiante.";
        }
    } catch (PDOException $exception) {
        echo "Error de consulta: " . $exception->getMessage();
    }
    ?>

    <script>
        function toggleEditForm() {
            var editForm = document.getElementById('edit-form');
            var editButton = document.querySelector('button');

            if (editForm.style.display === 'none') {
                editForm.style.display = 'block';
                editButton.textContent = 'Cancelar';
            } else {
                editForm.style.display = 'none';
                editButton.textContent = 'Editar Detalles';
            }
        }
        function subirFoto() {
        var photoForm = document.getElementById('photo-form');
        photoForm.submit();
    }
    </script>
   </div> 
</div>
</body>
</html>
