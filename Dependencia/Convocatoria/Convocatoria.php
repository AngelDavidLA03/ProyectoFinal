<!DOCTYPE html>
<html>
  <head>
    <title>Convocatorias y alumnos</title>
    <link rel="stylesheet" href="stylegaleriaconvocatoria.css">

    <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
    <?php/*
        session_start();

        // Se comprueba si la Dependencia ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "Dependencia"))
        {
            header("location: ../../login/login.html?redirect=true");
            session_destroy();
            exit;
        } */
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
        <option value="1">Convocatoria 1</option>
        <option value="2">Convocatoria 2</option>
        <option value="3">Convocatoria 3</option>
        <option value="4">Convocatoria 4</option>
        <option value="5">Convocatoria 5</option>
      </select>
    </div>
    <div class="card" id="Solicitud">
      <h2>Solicitud</h2>
      <p id="Solicitud"></p>
      <div id="detalles-convocatoria"></div>    </div>
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
       <script>
      const alumnosPorConvocatoria = {
        1: ["Juan", "María", "Pedro"],
        2: ["Ana", "Luis", "Marta"],
        3: ["Sofía", "Diego", "Lucía"],
        4: ["Carla", "David", "Elena"],
        5: ["Gabriel", "Miguel", "Raquel"]
      };
      const detallesPorConvocatoria = {
  1: "Detalles de la convocatoria 1",
  2: "Detalles de la convocatoria 2",
  3: "Detalles de la convocatoria 3",
  4: "Detalles de la convocatoria 4",
  5: "Detalles de la convocatoria 5",
};
    //Informacion de alumnos
      const convocatoriasSelect = document.getElementById("convocatorias");
      const alumnosList = document.getElementById("alumnos-list");
      const alumnoInfoCard = document.getElementById("alumno-info-card");
      const alumnoInfo = document.getElementById("alumno-info");
    
      convocatoriasSelect.addEventListener("change", () => {
        const convocatoriaSeleccionada = convocatoriasSelect.value;
        const alumnos = alumnosPorConvocatoria[convocatoriaSeleccionada];
        alumnosList.innerHTML = ""; // Limpiar lista de alumnos
    
        if (alumnos.length > 0) {
          alumnos.forEach((alumno) => {
            const li = document.createElement("li");
            const botonVer = document.createElement("button");
            botonVer.innerText = "Ver";
            botonVer.addEventListener("click", () => {
              alumnoInfo.innerText = `Nombre: ${alumno}`;
              alumnoInfoCard.style.display = "block";
            });
            li.innerText = alumno;
            li.appendChild(botonVer);
            alumnosList.appendChild(li);
          });
        } else {
          const li = document.createElement("li");
          li.innerText = "No hay alumnos inscritos en esta convocatoria.";
          alumnosList.appendChild(li);
        }
      });
      //Informacion de convocatorias
      convocatoriasSelect.addEventListener("change", () => {
  const convocatoriaSeleccionada = convocatoriasSelect.value;
  const detallesConvocatoria = detallesPorConvocatoria[convocatoriaSeleccionada];
  const detallesElement = document.getElementById("detalles-convocatoria");
  detallesElement.textContent = detallesConvocatoria;
});
//Para aceptar o rechazar 
const aceptarBtn = document.getElementById("aceptar-btn");
const rechazarBtn = document.getElementById("rechazar-btn");

aceptarBtn.addEventListener("click", () => {
  // Código para aceptar al alumno
});

rechazarBtn.addEventListener("click", () => {
  // Código para rechazar al alumno
});

      
    </script>
    
  </body>
</html>
