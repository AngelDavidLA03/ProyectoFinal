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

    <h2 class="centered-heading">PORTAL</h2>
    <div class="user-menu">
      <a href="#" class="user-icon"><img src="https://via.placeholder.com/150" alt="User"></a>
      <ul class="dropdown-menu">
        <li><a href="#" class="menu-option">Perfil</a></li>
        <li><a href="#" class="menu-option">Configuración</a></li>
        <li><a href="..//login/login.html" class="menu-option">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>
</head>
<body>
  <div class="teams-block">
    <h2>Servicios Sociales Disponibles</h2>
    <link rel="stylesheet" href="styleseleccionar.css">




    <?php 
  include 'select.php';

  ?>
  </div>
</body>
</html>
