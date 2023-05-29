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
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "DEPENDENCIA"))
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
                    <li><a href="../cuenta/iniciodependencia.php">Cuenta</a></li>
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
    <?php
      // Conectar a la base de datos
      $conexion = mysqli_connect("localhost", "u611167522_root", "G3nU1n4M3nT3{]?_", "u611167522_db_serviciosoc");

      // Obtener los parámetros de la petición AJAX
      $codUser = $_SESSION["user"];

      // Ejecutar el procedimiento almacenado
      $stmt = $conexion->prepare("CALL folioSS(?)");
      $stmt->bind_param("s",$codUser);

      $stmt->execute();
      
      $r = $stmt->get_result();

      while ($fila = mysqli_fetch_assoc($r)) 
      {
        // Acceder a las columnas de la fila
        $f = $fila['folio'];
        // Enviar una respuesta al cliente
        echo "Nueva Solicitud - ".$f."<br>";
      }
      
      
      // Cerrar la conexión a la base de datos
      mysqli_close($conexion);
    ?>
    </div>
    <!-- AQUI ESMPIEZA EL DESMADRE DE LA COSA ESA-->
    <div class="card-body">
      <form action="../../functionsDB/nuevoServicio.php" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nom">Nombre del programa:</label>
              <input type="text" id="nom" name="nom" maxlength="54" required>
            </div>
            <div class="form-group">
              <label for="obj">Objetivos:</label>
              <input type="text" id="obj" name="obj" maxlength="108" required>
            </div>
            <div class="form-group">
              <label for="actividades">Actividades:</label>
              <input type="text" id="actividades" name="actividades" maxlength="256" style="font-size: 20px;" required>
            </div>
            <div class="form-group">
              <label for="details">Detalles de actividades:</label>
              <input type="text" id="details" name="details" maxlength="256" required>
            </div>
          </div>
            <div class="col-md-6">
            <div class="form-group">
              <label for="caracts">Características del solicitante:</label>
              <input type="text" id="caracts" name="caracts" maxlength="256" required>
            </div>
            <div class="form-group">
              <label for="cupo">Máximo de participantes:</label>
              <input type="number" id="cupo" name="cupo" required>
            </div>  
            <div class="form-group">
              <label for="jorn">Jornada laboral:</label>
              <input type="text" id="jorn" name="jorn" placeholder="LUNES-VIERNES" maxlength="17" required >
            </div>
            <div class="form-group">
              <label for="fechaInicio">Fecha de inicio:</label>
              <input type="date" id="fechaInicio" name="fechaInicio" required>
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

<script language="javascript">
      
      // Se obtiene el parametro enviado desde el PHP y se comprueba de que coincida con el argumento dado
		  const urlParams = new URLSearchParams(window.location.search);
		  const red = urlParams.get('requery');

      // Se analiza si uno de los parametros es verdadero
      if (red === "true")
      {
        // Muestra el mensaje de alerta dado cuando el login falla
        alert("Nueva solicitud de servicio social generada exitosamente.")
      }   
    </script>

  </body>

</html>






