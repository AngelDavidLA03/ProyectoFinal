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
  
  </head>



  <body>
    <!-- Menú superior-->
    <header>
        <div class="container1">
          <nav>
            <ul>
                   <li><a href="../iniciocoordinador.php">Inicio</a></li>
                   <li><a href="../documentos/documentos.php">Subir documentos</a></li>
                   <li><a href="../alumno/alumno.php">Alumnos en servicio</a></li>
                   <li><a href="../dependencias/dependencias.php">Dependencias Registradas</a></li>
                   <li><a href="../solicitudes/solicitudes.php">Solicitudes</a></li>
                   <li><a href="../../functionsDB/logout.php">Cerrar sesión</a></li>
            </ul>
          </nav>
        </div>
    </header>


  <!-- opcion subir Formatos documentos -->
  <div class="header-container">
    <h1>Subir Formatos Documentos</h1>
  </div>


  <!-- Mostrar la galeria de imagenes -->
  <div class="gallery">
    <!-- Opcion Más información -->
    <div class="gallery-item">
      <img src="./images/cartapresentacion.jpg" alt="CartaPre">
      <div class="description">Carta Presentación</div>
      <div class="button-container2">
        <form method="post" action="saveCPE.php" enctype="multipart/form-data">
          <input type="file" name="file" id="upload-file1" style="display: none;">
          <input type="hidden" name="opcion" value="1">
          <input type="submit" value="Subir" class="upload-button">
        </form>
        <div class="selected-file" id="selected-file1"></div>
        <button onclick="uploadFile(1)" class="select-button">Seleccionar</button>
      </div>
    </div>

    <!-- Opcion Registrar -->
    <div class="gallery-item">
      <img src="./images/reporte.jpg" alt="ReporteAct">
      <div class="description"> Reporte Actividades/Avance </div>
      <div class="button-container2">
        <form method="post" action="saveRAC.php">
          <input type="hidden" name="opcion" value="2">
          <input type="submit" value="Subir" class="upload-button">
        </form>
        <div class="selected-file" id="selected-file2"></div>
        <input type="file" id="upload-file2" style="display: none;">
        <button onclick="uploadFile(2)" class="select-button">Seleccionar</button>
      </div>
    </div>

    <!-- Opcion Subir documentos -->
    <div class="gallery-item">
      <img src="./images/cartaliberacion.jpg" alt="LiberacionServ">
      <div class="description"> Liberación Servicio Social </div>
      <div class="button-container2">
        <form method="post" action="saveCLI.php">
          <input type="hidden" name="opcion" value="3">
          <input type="submit" value="Subir" class="upload-button">
        </form>
        <div class="selected-file" id="selected-file3"></div>
        <input type="file" id="upload-file3" style="display: none;">
        <button onclick="uploadFile(3)" class="select-button">Seleccionar</button>
      </div>
    </div>
  

      <!-- Opcion Subir documentos -->
    <div class="gallery-item">
      <img src="./images/cartabaja.jpg" alt="CartaBaja">
      <div class="description"> Carta Baja </div>
      <div class="button-container2">
        <form method="post" action="saveCBA.php">
          <input type="hidden" name="opcion" value="4">
          <input type="submit" value="Subir" class="upload-button">
        </form>
        <div class="selected-file" id="selected-file3"></div>
        <input type="file" id="upload-file4" style="display: none;">
        <button onclick="uploadFile(4)" class="select-button">Seleccionar</button>
      </div>
    </div>


      <!-- Opcion Subir documentos -->
    <div class="gallery-item">
      <img src="./images/cartaliberacion.jpg" alt="Convenio">
      <div class="description"> Convenio </div>
      <div class="button-container2">
        <form method="post" action="saveCNV.php">
          <input type="hidden" name="opcion" value="5">
          <input type="submit" value="Subir" class="upload-button">
        </form>
        <div class="selected-file" id="selected-file3"></div>
        <input type="file" id="upload-file5" style="display: none;">
        <button onclick="uploadFile(5)" class="select-button">Seleccionar</button>
      </div>
    </div>
  </div>


  <!-- PROPUESTA FUNCIONALIDAD CONEXION CON BASE DATOS-->
<script>
    function uploadFile(fileNumber) {
      const fileInput = document.getElementById(`upload-file${fileNumber}`);
      const selectedFile = document.getElementById(`selected-file${fileNumber}`);
      fileInput.click();
      fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        selectedFile.textContent = file.name;
        // Aquí puedes agregar la lógica para subir el archivo a una base de datos
        console.log('Archivo seleccionado:', file);
        // Aquí puedes llamar a una función para subir el archivo a la base de datos
      });
    }
  </script>
      
  </body>
</html>