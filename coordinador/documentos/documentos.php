<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
  
    <link rel="stylesheet" type="text/css" href="documentos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
    <?php
        session_start();

        // Se comprueba si el Coordinador ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "COORDINADOR"))
        {
            header("location: ../../login/login.html?redirect=true");
            session_destroy();
            exit;
        } 
    ?>

  </head>



  <body>
    <!-- Menú superior-->
    <header>
        <div class="container1">
          <nav>
            <ul>
                <li><a href="../coordinador.php">Crear cuenta</a></li>
                <li><a href="../documentos/documentos.php">Subir documentos</a></li>
                <li><a href="../alumno/alumno.php">Alumnos en servicio</a></li>
                <li><a href="../dependencias/dependencias.php">Dependencias</a></li>
                <li><a href="../solicitudes/solicitudes.php">Solicitudes</a></li>
                <li><a href="../../login/login.html">Cerrar sesión</a></li>
            </ul>
          </nav>
        </div>
    </header>


    
    
    <div class="container">
  <h1>Formatos Documentos Alumnos</h1>

  <div class="grid-x">
    <div class="large-12 columns">
      <div class="image-gallery">

        <div class="item">
          <label for="doc1">
            <img src="./images/cartapresentacion.jpg" alt="imagen1">
            <p>Carta Presentación</p>
          </label>
          <input type="file" id="doc1" name="archivo1"/>
        </div>

        <div class="item">
          <label for="doc2">
            <img src="./images/reporte.jpg" alt="imagen2">
            <p> Reporte de Actividades/Avance</p>
          </label>
          <input type="file" id="doc2" name="archivo2"/>
        </div>

        <div class="item">
          <label for="doc3">
            <img src="./images/cartaliberacion.jpg" alt="imagen3">
            <p>Liberación Servicio Social</p>
          </label>
          <input type="file" id="doc3" name="archivo3" />
        </div>

      </div>
    </div>
  </div>
</div>

<div class="btn-container">
  <button type="submit">Subir</button> 
</div>


<!-- Hacer conexión con la base de datos -->
<?php
  include("../config/subirdocumentos.php")
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
  $(document).ready(function() {
    $('.image-gallery').on('click', 'input[type="file"]', function() {
      $(this).trigger('click');
    });
  });
</script>
</div>

      
  </body>
</html>