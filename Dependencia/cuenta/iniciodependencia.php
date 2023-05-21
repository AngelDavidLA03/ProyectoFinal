<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
  
    <link rel="stylesheet" type="text/css" href="./styleinicio.css">

</head>
<body>

<!-- Menú superior-->
  <header>
    <div class="container1">
      <nav>
        <ul>
          <li><a href="../cuenta/iniciodependencia.php">Cuenta</a></li>
          <li><a href="../alumnos/alumno.php">Alumnos en Servicio</a></li>
          <li><a href="../NuevaSolicitud/Solicitud.php">Solicitud</a></li>
          <li><a href="../Convocatoria/Convocatoria.php">Convocatorias</a></li>
          <li><a href="../../login/login.html">Cerrar Sesión</a></li>
        </ul>
       </nav>
     </div>
   </header>



  <div class="content-below-menu">
    <!-- Contenido de la página -->
  </div>

  <div class="menu-container">
    <ul class="tab-menu"> 
      <li><a class="tab-link" href="#verificacion">      Paso 1 Verificación Datos</a></li>
      <li><a class="tab-link" href="#representante">     Paso 2 Representante/Responsable</a></li>
      <li><a class="tab-link" href="#documentaciondep">  Paso 3 Documentación Dependencia</a></li>
      <li><a class="tab-link" href="#documentacionrep">  Paso 4 Documentación Representante</a></li>
      <li><a class="tab-link" href="#convenio">          Paso 5 Convenio</a></li>
    </ul>
  </div>


  <!-- VERIFICACION DATOS DEPENDENCIA -->

  <div class="tab-content" id="verificacion">

      <!-- Logo Dependencia -->
      <div class="profile-image-container">
            <div class="profile-image-wrapper">
              <img src="./tecnm.png" alt="Profile Image" class="profile-image">
            </div>
            <div class="profile-image-actions">
              <input type="file" id="profile-image-input" accept="image/*" onchange="previewProfileImage(event)">
              <label for="profile-image-input" class="profile-image-label"><i class="fas fa-camera"></i></label>
            </div>
      </div>

  
       <!-- Datos Dependencia -->
    <div class="card" style="display:block;">
        
        <div class="title-container">
          <h2 color="white">Datos Dependencia</h2>
        </div>
       
        <div class="content-container">
          <form>

            <label>Código Usuario:</label>
            <input type="text" name="codigouser" style="text-transform: uppercase;" required>
          
            <label>Nombre Dependencia:</label>
            <input type="text" name="nomdep" style="text-transform: uppercase;" required>

            <label>RFC:</label>
            <input type="text" name="rfc" style="text-transform: uppercase;" required>

            <label>Cantidad de Trabajadores:</label>
            <input type="text" name="canttrab" style="text-transform: uppercase;" required>

            <label>Giro:</label>
            <input type="text" name="giro" style="text-transform: uppercase;" required>

            <label>Teléfono:</label>
            <input type="text" name="tel" style="text-transform: uppercase;" required>

            <label>Calle:</label>
            <input type="text" name="calle" style="text-transform: uppercase;" required>

            <label>Numero Exterior:</label>
            <input type="text" name="numext" style="text-transform: uppercase;" required>

            <label>Numero Interior:</label>
            <input type="text" name="numint" style="text-transform: uppercase;" required>

            <label>Colonia:</label>
            <input type="text" name="colonia" style="text-transform: uppercase;" required>

            <label>Código Postal:</label>
            <input type="text" name="cp" style="text-transform: uppercase;" required>

            <label>Ciudad:</label>
            <input type="text" name="ciudad" style="text-transform: uppercase;" required>

            <label>Entidad Federativa:</label>
            <input type="text" name="entfed" style="text-transform: uppercase;" required>

            <label>Tipo:</label>
            <input type="text" name="tipo" style="text-transform: uppercase;" required>

            <div class="button-container">
              <button type="submit">Guardar</button>
              <button type="button" onclick="hidePopup()">Cancelar</button>
            </div>
          </form>
        </div>
    </div>

  </div>



  <!-- VERIFICACION DATOS REPRESENTANTE -->

  <div class="tab-content" id="representante">

 <!-- Logo Dependencia -->
 <div class="profile-image-container">
            <div class="profile-image-wrapper">
              <img src="./images/empleados.jpg" alt="Profile Image" class="profile-image">
            </div>
      </div>
      

  <!-- Datos Representante -->    

  <div class="card" style="display:block;">  
    <div class="title-container">
            <h2 color="white">Datos Representante</h2>
          </div>
        
          <div class="content-container">
            <form>

              <label>Código Usuario:</label>
              <input type="text" name="codigouserdir" style="text-transform: uppercase;" required>
            
              <label>Nombre Representante:</label>
              <input type="text" name="nomdir" style="text-transform: uppercase;" required>

              <label>Apellido Paterno:</label>
              <input type="text" name="appatdir" style="text-transform: uppercase;" required>

              <label>Apellido Materno:</label>
              <input type="text" name="apmatdir" style="text-transform: uppercase;" required>
              
              <label>Edad:</label>
              <input type="number" name="edaddir" style="text-transform: uppercase;" required step="1"> 

              <label>Curp:</label>
              <input type="text" name="curodir" style="text-transform: uppercase;" required>

              <label>Email:</label>
              <input type="text" name="emaildir" style="text-transform: uppercase;" required>
              
              <label>Teléfono:</label>
              <input type="text" name="teldir" style="text-transform: uppercase;" required>

              <div class="button-container">
                <button type="submit">Guardar</button>
                <button type="button" onclick="hidePopup()">Cancelar</button>
              </div>
            </form>
          </div>
      </div>
   </div>

  </div>



  <!-- DOCUMENTACION DEPENDECIA -->
  <div class="tab-content" id="documentaciondep">
  <div class="header-container">
    <h1>Subir Documentos Correspondientes a la Dependencia</h1>
  </div>
  <!-- Mostrar la galeria de imagenes -->
  <div class="gallery">
    <!-- Opcion Más información -->
    <div class="gallery-item">
      <img src="./images/decreto.jpg" alt="Más información">
      <div class="description">Decreto, ley, normativa que acredita su creación</div>
      <div class="button-container2">
        <form method="post" action="PONER DOCUMENTO PHP DE BSASE DATOS EJEMPLO: SUBIR.PHP" enctype="multipart/form-data">
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
      <img src="./images/representante.jpg" alt="Registrar">
      <div class="description">Nombramiento del representante de la dependencia</div>
      <div class="button-container2">
        <form method="post" action="PONER DOCUMENTO PHP DE BSASE DATOS EJEMPLO: SUBIR.PHP">
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
      <img src="./images/comprobantedomicilio.jpg" alt="Subir archivos">
      <div class="description">Comprobante de domicilio</div>
      <div class="button-container2">
        <form method="post" action="PONER DOCUMENTO PHP DE BSASE DATOS EJEMPLO: SUBIR.PHP">
          <input type="hidden" name="opcion" value="3">
          <input type="submit" value="Subir" class="upload-button">
        </form>
        <div class="selected-file" id="selected-file3"></div>
        <input type="file" id="upload-file3" style="display: none;">
        <button onclick="uploadFile(3)" class="select-button">Seleccionar</button>
      </div>
    </div>
  </div>

  
</div>




  <!-- DOCUMENTACION REPRESENTANTE-->

  <div class="tab-content" id="documentacionrep">
  <div class="header-container">
    <h1>Subir Documentos Correspondientes con el Representante </h1>
  </div>
  
  <!-- Mostrar la galeria de imagenes -->
  <div class="gallery">

    <!-- Opcion Visualizar y crear solcitudes de vacantes/ solciitante alumnos-->
  <div class="gallery-item">
    <img src="./images/identificacionoficial.jpg" alt="Solicitudes">
    <div class="description">Identificación Oficial</div>
    <div class="button-container2">
      <form method="post" action="PONER DOCUMENTO PHP DE BSASE DATOS EJEMPLO: SUBIR.PHP">
        <input type="hidden" name="opcion" value="4">
        <input type="submit" value="Subir" class="upload-button">
        </form>
        <div class="selected-file" id="selected-file4"></div>
        <input type="file" id="upload-file4" style="display: none;">
      <button onclick="uploadFile(4)" class="select-button">Seleccionar</button>
    </div>
  </div>

<!-- Opcion Visualizar Aspirantes-->
  <div class="gallery-item">
    <img src="./images/RFC.png" alt="Aceptar/Rechazar Aspirantes">
    <div class="description">Registro Federal de Contribuyentes </div>
    <div class="button-container2">
      <form method="post" action="PONER DOCUMENTO PHP DE BSASE DATOS EJEMPLO: SUBIR.PHP">
        <input type="hidden" name="opcion" value="5">
        <input type="submit" value="Subir" class="upload-button">
      </form>
      <div class="selected-file" id="selected-file5"></div>
      <input type="file" id="upload-file5" style="display: none;">
      <button onclick="uploadFile(5)" class="select-button">Seleccionar</button>
    </div>
  </div>

 </div>




  <!-- DOCUMENTACION CONVENIO PENDIENTE IMPLEMENTAR -->

  <div class="tab-content" id="convenio">
    <h3>Contenido de la pestaña Convenio</h3>
    <p>Este es el contenido de la pestaña Contacto.</p>
  </div>






  <!-- FUNCIONALIDAD CON SCRIPTS PARA EL MENU INFERIOR-->

  <script>
    // Obtener los enlaces de las pestañas
    var tabLinks = document.querySelectorAll('.tab-link');

    // Obtener todos los contenidos de las pestañas
    var tabContents = document.querySelectorAll('.tab-content');

    // Establecer el estado inicial (seleccionar la pestaña "Inicio" y mostrar su contenido)
    tabLinks[0].parentNode.classList.add('active');
    tabContents[0].classList.add('active');

    // Agregar un evento de clic a cada enlace
    tabLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
    event.preventDefault();

    // Obtener el ID del contenido asociado a la pestaña
    var targetId = this.getAttribute('href');

    // Quitar la clase 'active' de todas las pestañas y contenidos
    tabLinks.forEach(function(link) {
      link.parentNode.classList.remove('active');
    });
    tabContents.forEach(function(content) {
      content.classList.remove('active');
    });

    // Agregar la clase 'active' al enlace y al contenido seleccionados
    this.parentNode.classList.add('active');
    document.querySelector(targetId).classList.add('active');
  });
});
  </script>


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