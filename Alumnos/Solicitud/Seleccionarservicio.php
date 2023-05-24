<!DOCTYPE html>
<html>
<head> 
  <title>Servicios Sociales</title>
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

<div class="header">
        <?php
        require_once 'consulta.php';

        $student_id = $_SESSION['user'];; // ID del estudiante que deseas mostrar

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
  </div>
  <div class="teams-block">
    <h2>Servicios Sociales Disponibles</h2>
    <p style="color: red; font-size: smaller;">*Postularse en una solicitud no garantiza la aceptación*</p>
    <link rel="stylesheet" href="styleseleccionar.css">
    <?php 
      include 'select.php';
    ?>
  </div>
  <style>
    .menu {
        display: flex;
        justify-content: space-around;
        background-color: #1d009f8a;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
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
<a href="../InicioAlumno/estudiante.php">   <button class="menu-button">Paso 1. Actualizar datos</button>
    <a href="#.php"><button class="menu-button highlight">Paso 2. Seleccionar servicio social</button></a>
    <a href="../Reportes/reporte.php"><button class="menu-button">Paso 3. Reportes</button></a>
</div>
</body>
</html>
