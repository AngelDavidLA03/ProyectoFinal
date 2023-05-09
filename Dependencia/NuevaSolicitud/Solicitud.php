<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Solicitud Nueval</title>
    <link rel="stylesheet" type="text/css" href="stylesolicitud.css">

    <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
    <?php
        session_start();

        // Se comprueba si la Dependencia ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "Dependencia"))
        {
            header("location: ../../login/login.html?redirect=true");
            session_destroy();
            exit;
        } 
    ?>
</head>
<body>
	<header>
		<div class="container2">
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
    </header>
 <div class="container">
  <div class="card">
    <div class="card-header">
      <h2>Nueva solicitud</h2>
    </div>
    <!-- AQUI ESMPIEZA EL DESMADRE DE LA COSA ESA-->
    <div class="card-body">
      <form action="insertar.php" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="Titulo">Titulo:</label>
              <input type="text" id="Titulo" name="Titulo" required>
            </div>
            <div class="form-group">
              <label for="horaInicio">Hora de inicio:</label>
              <input type="time" id="horaInicio" name="horaInicio" required>
            </div>
            <div class="form-group">
              <label for="diasPorSem">Días por semana:</label>
              <input type="number" id="diasPorSem" name="diasPorSem" required>
            </div>
            <div class="form-group">
              <label for="fechaInicio">Fecha de inicio:</label>
              <input type="date" id="fechaInicio" name="fechaInicio" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="actividades">Actividades:</label>
              <input type="text" id="actividades" name="actividades" style="font-size: 20px;" required>
            </div>
            <div class="form-group">
              <label for="horaFin">Hora de fin:</label>
              <input type="time" id="horaFin" name="horaFin" required>
            </div>
            <div class="form-group">
              <label for="fechaFin">Fecha de fin:</label>
              <input type="date" id="fechaFin" name="fechaFin" required>
            </div>
          </div>
        </div>
        <button type="submit">Aceptar</button>
      </form>
    </div>
  </div>
</div>


  </body>

</html>






