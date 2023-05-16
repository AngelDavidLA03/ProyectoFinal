<!DOCTYPE html>
<html>
  <head>
    <title>Convocatorias y alumnos</title>
    <link rel="stylesheet" href="stylegaleriaconvocatoria.css">

    <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
    <?php/*
        session_start();

        // Se comprueba si la Dependencia ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "DEPENDENCIA"))
        {
            header("location: ../../login/login.html?redirect=true");
            session_destroy();
            exit;
        }*/
    ?>

  </head>
  <body>
    <header>
      <div class="container">
        <nav>
          <ul>
                <li><a href="../cuenta/services.php">Cuenta</a></li>
                <li><a href="../alumnos/alumno.php">Alumnos en Servicio</a></li>
                <li><a href="../NuevaSolicitud/Solicitud.php">Solicitud</a></li>
                <li><a href="../Convocatoria/Convocatoria.php">Convocatorias</a></li>
                <li><a href="../../functionsDB/logout.php">Cerrar Sesión</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="card">
  <label for="convocatorias">Convocatorias disponibles:</label>
  <select id="convocatorias" class="convocatorias">
    
  <?php include 'obtenerconvocatorias.php'; /**/?>

</select>
  
</div>
    <div class="card" id="Solicitud">
      <h2>Detalles</h2>
      <?php    include 'detalles.php';  ?>

      <div id="detalles-convocatoria"></div> 
    </div>


     <div class="card" id="alumnos-card">
      <h2>Solicitud de alumnos</h2>
      <ul class="alumnos" id="alumnos-list">
      </ul>
    </div>




    <div class="card" id="alumno-info-card">
  <h2>Informacion del alumno</h2>
  <p id="alumno-info"></p>
  <div class="botones">
    <button id="aceptar-btn">Aceptar</button>
    <button id="rechazar-btn">Rechazar</button>
  </div>
</div>
    
    
  </body>
</html>
