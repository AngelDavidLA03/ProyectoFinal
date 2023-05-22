<!DOCTYPE html>
<html>
  <head>
    <title>Convocatorias y alumnos</title>
    <link rel="stylesheet" href="stylegaleriaconvocatoria.css">

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
      <div class="container">
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
    <div class="card">
  <label for="convocatorias">Convocatorias realizadas:</label>
  <select id="convocatorias" class="convocatorias">
  <option value="null"> </option>
  <?php include 'obtenerlista.php'; /**/?>

</select>
  
</div>
    <div class="card" id="Solicitud">
      <h2>Detalles</h2>
      

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
  </div>
</div>
        
  <script> 
        var comboBox = document.getElementById("convocatorias");
        comboBox.addEventListener("change", loadDetails);

      function loadDetails()
      {
        var selectedValue = comboBox.value;
          // Hacer una petición AJAX al servidor para ejecutar el procedimiento almacenado correspondiente
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (this.readyState == 4 && this.status == 200) 
            {
              document.getElementById("Solicitud").innerHTML = this.responseText;
            }
          };
          xhttp.open("POST", "detalles.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("idServicio=" + selectedValue);

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (this.readyState == 4 && this.status == 200) 
            {
              document.getElementById("alumnos-card").innerHTML = this.responseText;
            }
          };
          xhttp.open("POST", "alumnos.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("idServicio=" + selectedValue);
      }

      </script>

  <script>

    // Obtener el contenedor de los botones
    var contenedor = document.getElementById('alumnos-card');

    // Agregar un manejador de eventos al contenedor
    contenedor.addEventListener('click', loadAlumn);

  function loadAlumn()
  {
    // Verificar si se hizo clic en un botón
    if (event.target.classList.contains('btnAlumn')) {
        var valor = event.target.getAttribute('data-valor');
        // Hacer una petición AJAX al servidor para ejecutar el procedimiento almacenado correspondiente
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (this.readyState == 4 && this.status == 200) 
            {
              document.getElementById("alumno-info-card").innerHTML = this.responseText;
            }
          };
          xhttp.open("POST", "informacion.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("alumn=" + valor);
      }
  }
  </script>
    
    <script>
      // Obtener el contenedor de los botones
      var contenedor = document.getElementById('alumno-info-card');

      // Agregar un manejador de eventos al contenedor
      contenedor.addEventListener('click', function()
      {
        adminSolic();
        loadDetails();
        loadAlumn();
      });

    function adminSolic()
    {
      var alumn = event.target.getAttribute('data-valor');
        var id = comboBox.value;
        if (event.target.classList.contains('aceptar-btn')) {
          // Hacer una petición AJAX al servidor para ejecutar el procedimiento almacenado correspondiente
          var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
              if (this.readyState == 4 && this.status == 200) 
              {
                alert("Se informará al usuario de la decision tomada.");
                document.getElementById("alumno-info-card").innerHTML = this.responseText;
              }
            };
            xhttp.open("POST", "aceptarsolicitud.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("alumn=" + alumn + "&servc=" + id);

        }
        else if(event.target.classList.contains('rechazar-btn')){
          // Hacer una petición AJAX al servidor para ejecutar el procedimiento almacenado correspondiente
          var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() 
            {
              if (this.readyState == 4 && this.status == 200) 
              {
                alert("Se informará al usuario de la decision tomada.");
                document.getElementById("alumno-info-card").innerHTML = this.responseText;
              }
            };
            xhttp.open("POST", "rechazarsolicitud.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("alumn=" + alumn + "&servc=" + id);

            
          }
          
    }
    </script>
  </body>
</html>
