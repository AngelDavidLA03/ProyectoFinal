<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
  
    <link rel="stylesheet" type="text/css" href="./styleinicio.css">

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

<!-- Menú superior-->
  <header>
    <div class="container1">
      <nav>
        <ul>
          <li><a href="../cuenta/iniciodependencia.php">Cuenta</a></li>
          <li><a href="../alumnos/alumno.php">Alumnos en Servicio</a></li>
          <?php
            $id = $_SESSION['user'];

            $conn = mysqli_connect('localhost', 'u611167522_root', 'G3nU1n4M3nT3{]?_', 'u611167522_db_serviciosoc');

            $resultado = mysqli_query($conn, "SELECT COUNT(numConv) AS isExist FROM convenio WHERE codUserDepend = '$id'");
            $fila = mysqli_fetch_assoc($resultado);

            $exist = $fila["isExist"];

            if($exist == '1')
            {
              echo"<li><a href='../NuevaSolicitud/Solicitud.php'>Solicitud</a></li>";
              echo"<li><a href='../Convocatoria/Convocatoria.php'>Convocatorias</a></li>";
            }
          ?>

          <li><a href="../../functionsDB/logout.php">Cerrar Sesión</a></li>
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
        <?php
          $year = date("Y"); // Obtener el año actual
          $lastTwoDigits = substr($year, -2); // Obtener los dos últimos dígitos del año
          
          $id = $_SESSION['user'];
          $prefID = $lastTwoDigits . "66DEP0000";

          if ($id != $prefID)
          {
            $conn = mysqli_connect('localhost', 'u611167522_root', 'G3nU1n4M3nT3{]?_', 'u611167522_db_serviciosoc');

            $resultado = mysqli_query($conn, "SELECT logo FROM dependencia WHERE codUserDepend = '$id'");
            $fila = mysqli_fetch_assoc($resultado);

            $blob = $fila["logo"];
            $logo = base64_encode($blob);

            ?>
            <div class="profile-image-wrapper">
              <img src="data:image/jpeg;base64,<?php echo $logo?>" alt="Profile Image" class="profile-image">
            </div>
            <?php

            
          }
          else
          {
            ?>
            <div class="profile-image-wrapper">
              <img src="./tecnm.png" alt="Profile Image" class="profile-image">
            </div>
            <div class="profile-image-actions">
              <input type="file" name="profile-image" id="profile-image-input" accept="image/*" onchange="previewProfileImage(event)">
              <label for="profile-image-input" class="profile-image-label"><i class="fas fa-camera"></i></label>
            </div>
            <?php
          }
        ?>
      </div>
      

  
       <!-- Datos Dependencia -->
    <div class="card" style="display:block;">
        
        <div class="title-container">
          <h2 color="white">Datos Dependencia</h2>
        </div>
       
        <div class="content-container">
          <form id="dependForm" enctype="multipart/form-data">

            <?php
              $tipo = 'DEPENDENCIA';
              // Llamar a los procedimientos almacenados mediante una conexión a la base de datos
              $mysqli = new mysqli('localhost', 'u611167522_root', 'G3nU1n4M3nT3{]?_', 'u611167522_db_serviciosoc'); // Reemplaza con la configuración correcta de la base de datos

              // Verificar la conexión
              if ($mysqli->connect_errno) {
                echo "Error en la conexión a la base de datos: " . $mysqli->connect_error;
                exit();
              }

              // Llamar al procedimiento SAVEdocuments
              $stmt = $mysqli->prepare("CALL getCodUser(?)");
              $stmt->bind_param("s", $tipo);

              $stmt->execute();

              $r = $stmt->get_result();

              while ($fila = mysqli_fetch_assoc($r)) 
              {
                // Acceder a las columnas de la fila
                $f = $fila['folio'];
              }

              $year = date("Y"); // Obtener el año actual
              $lastTwoDigits = substr($year, -2); // Obtener los dos últimos dígitos del año
              
              $id = $_SESSION['user'];
              $prefID = $lastTwoDigits . "66DEP0000";

              if ($id != $prefID)
              {
                $conn = mysqli_connect('localhost', 'u611167522_root', 'G3nU1n4M3nT3{]?_', 'u611167522_db_serviciosoc');

                $resultado = mysqli_query($conn, "SELECT nomDepend, RFC, numTrabajadores, enfoqueDepend, numTelfDepend, calleDepend, numExtDepend, numIntDepend, coloniaDepend, cpDepend, ciudadDepend, efDepend, tipoDepend FROM dependencia WHERE codUserDepend = '$id'");
                $fila = mysqli_fetch_assoc($resultado);

                echo "<label>Código de Usuario:</label>";
                echo "<input type='text' name='codigouser' value='" . $id . "' readonly style='text-transform: uppercase;' maxlength='11' required>";
       
                echo"<label>Nombre de Dependencia:</label>";
                echo"<input type='text' name='nomdep' value='".$fila["nomDepend"]."' readonly style='text-transform: uppercase;' maxlength='108' required>";

                echo"<label>RFC:</label>";
                echo"<input type='text' name='rfc' value='".$fila["RFC"]."' readonly style='text-transform: uppercase;' maxlength='13' required>";

                echo"<label>Cantidad de Trabajadores:</label>";
                echo"<input type='number' name='canttrab' value='".$fila["numTrabajadores"]."' readonly style='text-transform: uppercase;' maxlength='3' required>";

                echo"<label>Giro:</label>";
                echo"<input type='text' name='giro' value='".$fila["enfoqueDepend"]."' readonly style='text-transform: uppercase;' maxlength='54' required>";

                echo"<label>Teléfono:</label>";
                echo"<input type='text' name='tel' value='".$fila["numTelfDepend"]."' readonly style='text-transform: uppercase;' maxlength='18' required>";

                echo"<label>Calle:</label>";
                echo"<input type='text' name='calle' value='".$fila["calleDepend"]."' readonly style='text-transform: uppercase;' maxlength='54' required>";

                echo"<label>Numero Exterior:</label>";
                echo"<input type='number' name='numext' value='".$fila["numExtDepend"]."' readonly style='text-transform: uppercase;' maxlength='3' required>";

                echo"<label>Numero Interior:</label>";
                echo"<input type='number' name='numint' value='".$fila["numIntDepend"]."' readonly style='text-transform: uppercase;' maxlength='3' required>";

                echo"<label>Colonia:</label>";
                echo"<input type='text' name='colonia' value='".$fila["coloniaDepend"]."' readonly style='text-transform: uppercase;' maxlength='28' required>";

                echo"<label>Código Postal:</label>";
                echo"<input type='number' name='cp' value='".$fila["cpDepend"]."' readonly style='text-transform: uppercase;' maxlength='5' required>";

                echo"<label>Ciudad:</label>";
                echo"<input type='text' name='ciudad' value='".$fila["ciudadDepend"]."' readonly style='text-transform: uppercase;' maxlength='4' required>";

                echo"<label>Entidad Federativa:</label>";
                echo"<input type='text' name='entfed' value='".$fila["efDepend"]."' readonly style='text-transform: uppercase;' maxlength='28' required>";

                echo"<label>Tipo (PUBLICA, SOCIAL o PRIVADA):</label>";
                echo"<input type='text' name='tipo' value='".$fila["tipoDepend"]."' readonly style='text-transform: uppercase;' maxlength='7' required>";
                echo"</form>";
              }
              else
              {
                echo "<label>Código de Usuario:</label>";
                echo "<input type='text' name='codigouser' value='" . $f . "' readonly style='text-transform: uppercase;' maxlength='11' required>";
       
            ?>
              <label>Nombre de Dependencia:</label>
              <input type="text" name="nomdep" style="text-transform: uppercase;" maxlength="108" required>

              <label>RFC:</label>
              <input type="text" name="rfc" style="text-transform: uppercase;" maxlength="13" required>

              <label>Cantidad de Trabajadores:</label>
              <input type="number" name="canttrab" style="text-transform: uppercase;" maxlength="3" required>

              <label>Giro:</label>
              <input type="text" name="giro" style="text-transform: uppercase;" maxlength="54" required>

              <label>Teléfono:</label>
              <input type="text" name="tel" style="text-transform: uppercase;" maxlength="18" required>

              <label>Calle:</label>
              <input type="text" name="calle" style="text-transform: uppercase;" maxlength="54" required>

              <label>Numero Exterior:</label>
              <input type="number" name="numext" style="text-transform: uppercase;" maxlength="3" required>

              <label>Numero Interior:</label>
              <input type="number" name="numint" style="text-transform: uppercase;" maxlength="3" required>

              <label>Colonia:</label>
              <input type="text" name="colonia" style="text-transform: uppercase;" maxlength="28" required>

              <label>Código Postal:</label>
              <input type="number" name="cp" style="text-transform: uppercase;" maxlength="5" required>

              <label>Ciudad:</label>
              <input type="text" name="ciudad" style="text-transform: uppercase;" maxlength="48" required>

              <label>Entidad Federativa:</label>
              <input type="text" name="entfed" style="text-transform: uppercase;" maxlength="28" required>

              <label>Tipo (PUBLICA, SOCIAL o PRIVADA):</label>
              <input type="text" name="tipo" style="text-transform: uppercase;" maxlength="7" required>

            <div class="button-container">
              <button type="submit">Guardar</button>
              <button type="button" onclick="clearFields()">Cancelar</button>
            </div>
          </form>
          <?php
            }
            $mysqli->close();
            $stmt->close();
          ?>
        </div>

        <script>
          function previewProfileImage(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function () {
              const preview = document.querySelector('.profile-image');
              preview.src = reader.result;
            };
            if (input.files[0]) {
              reader.readAsDataURL(input.files[0]);
            }
          }

          function clearFields() {
            const inputs = document.querySelectorAll('input[name]:not([name="codigouser"]):not([name="codigouserdir"]');
            for (const input of inputs) {
              input.value = '';
            }
          }

          document.getElementById('dependForm').addEventListener('submit', function(e) {
          e.preventDefault();
          const form = document.getElementById('dependForm');
          
          // Crear un nuevo objeto FormData para contener los datos del formulario y la imagen
          const formData = new FormData();
          
          // Agregar los datos del formulario al objeto FormData
          const formInputs = form.querySelectorAll('input[name]');
          for (const input of formInputs) {
            formData.append(input.name, input.value);
          }

          // Obtener la imagen seleccionada
          const imageInput = document.querySelector('input[name="profile-image"]');
          const imageFile = imageInput.files[0];
          
          // Agregar la imagen al objeto FormData
          formData.append('profile-image', imageFile);
          
          const xhr = new XMLHttpRequest();
          xhr.open('POST', 'saveDepend.php', true);
          xhr.onload = function() {
            if (xhr.status === 200) {
              // Procesar la respuesta del servidor si es necesario
              alert('Los datos se han insertado correctamente.\nAvanzar al paso 2.');
            }
          };
          xhr.send(formData);
        });
          </script>
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
            <form id="dirForm" enctype="multipart/form-data">
            <?php
              $tipo = 'DEPENDENCIA';
              // Llamar a los procedimientos almacenados mediante una conexión a la base de datos
              $mysqli = new mysqli('localhost', 'u611167522_root', 'G3nU1n4M3nT3{]?_', 'u611167522_db_serviciosoc'); // Reemplaza con la configuración correcta de la base de datos

              // Verificar la conexión
              if ($mysqli->connect_errno) {
                echo "Error en la conexión a la base de datos: " . $mysqli->connect_error;
                exit();
              }

              // Llamar al procedimiento SAVEdocuments
              $stmt = $mysqli->prepare("CALL getCodUser(?)");
              $stmt->bind_param("s", $tipo);

              $stmt->execute();

              $r = $stmt->get_result();

              while ($fila = mysqli_fetch_assoc($r)) 
              {
                // Acceder a las columnas de la fila
                $f = $fila['folio'];
              }

              $year = date("Y"); // Obtener el año actual
              $lastTwoDigits = substr($year, -2); // Obtener los dos últimos dígitos del año
              
              $id = $_SESSION['user'];
              $prefID = $lastTwoDigits . "66DEP0000";

              if ($id != $prefID)
              {
                $conn = mysqli_connect('localhost', 'u611167522_root', 'G3nU1n4M3nT3{]?_', 'u611167522_db_serviciosoc');

                $resultado = mysqli_query($conn, "SELECT directorgeneral.nomDirector, directorgeneral.apDirector, directorgeneral.amDirector, directorgeneral.edadDirector, directorgeneral.curpDirector, directorgeneral.emailDirector, directorgeneral.numTelfDirector
                FROM directorgeneral INNER JOIN administrar ON directorgeneral.idDirector = administrar.idDirector 
                              INNER JOIN dependencia ON administrar.codUserDepend = dependencia.codUserDepend 
                WHERE dependencia.codUserDepend = '$id'");
                $fila = mysqli_fetch_assoc($resultado);

                echo "<label>Código de Usuario:</label>";
                echo "<input type='text' name='codigouser' value='" . $id . "' readonly style='text-transform: uppercase;' maxlength='11' required>";

                echo "<label>Nombre(s) de Representante:</label>";
                echo "<input type='text' name='nomdir' value='".$fila["nomDirector"]."' readonly style='text-transform: uppercase;' maxlength='54' required>";

                echo "<label>Apellido Paterno:</label>";
                echo "<input type='text' name='appatdir' value='".$fila["apDirector"]."' readonly style='text-transform: uppercase;' maxlength='36' required>";

                echo "<label>Apellido Materno:</label>";
                echo "<input type='text' name='apmatdir' value='".$fila["amDirector"]."' readonly style='text-transform: uppercase;' maxlength='36' required>";
                
                echo "<label>Edad:</label>";
                echo "<input type='number' name='edaddir' value='".$fila["edadDirector"]."' readonly style='text-transform: uppercase;' maxlength='2' required step='1'>";

                echo "<label>CURP:</label>";
                echo "<input type='text' name='curodir' value='".$fila["curpDirector"]."' readonly style='text-transform: uppercase;' maxlength='18' required>";

                echo "<label>Correo Electronico:</label>";
                echo "<input type='text' name='emaildir' value='".$fila["emailDirector"]."' readonly style='text-transform: uppercase;' maxlength='128' required>";
                
                echo "<label>Teléfono:</label>";
                echo "<input type='text' name='teldir' value='".$fila["numTelfDirector"]."' readonly style='text-transform: uppercase;' maxlength='18' required>";
                echo "</form>";
              }
              else
              {
                echo "<label>Código de Usuario:</label>";
                echo "<input type='text' name='codigouser' value='" . $f . "' readonly style='text-transform: uppercase;' maxlength='11' required>";
       
              ?>
              <label>Nombre(s) de Representante:</label>
              <input type="text" name="nomdir" style="text-transform: uppercase;" maxlength="54" required>

              <label>Apellido Paterno:</label>
              <input type="text" name="appatdir" style="text-transform: uppercase;" maxlength="36" required>

              <label>Apellido Materno:</label>
              <input type="text" name="apmatdir" style="text-transform: uppercase;" maxlength="36" required>
              
              <label>Edad:</label>
              <input type="number" name="edaddir" style="text-transform: uppercase;" maxlength="2" required step="1"> 

              <label>CURP:</label>
              <input type="text" name="curodir" style="text-transform: uppercase;" maxlength="18" required>

              <label>Correo Electronico:</label>
              <input type="text" name="emaildir" style="text-transform: uppercase;" maxlength="128" required>
              
              <label>Teléfono:</label>
              <input type="text" name="teldir" style="text-transform: uppercase;" maxlength="18" required>

              <div class="button-container">
                <button type="submit">Guardar</button>
                <button type="button" onclick="clearFields()">Cancelar</button>
              </div>
            <script>
              function clearFields() {
                const inputs = document.querySelectorAll('input[name]:not([name="codigouser"]):not([name="codigouserdir"]');
                for (const input of inputs) {
                  input.value = '';
                }
              }

              document.getElementById('dirForm').addEventListener('submit', function(e) {
              e.preventDefault();
              const form = document.getElementById('dirForm');

              // Crear un nuevo objeto FormData para contener los datos del formulario y la imagen
              const formData = new FormData();

              // Agregar los datos del formulario al objeto FormData
              const formInputs = form.querySelectorAll('input[name]');
              for (const input of formInputs) {
                formData.append(input.name, input.value);
              }

              const xhr = new XMLHttpRequest();
              xhr.open('POST', 'saveDir.php', true);
              xhr.onload = function() {
                if (xhr.status === 200) {
                  // Procesar la respuesta del servidor si es necesario
                  alert('Los datos se han insertado correctamente.\nAvanzar al paso 3.\nContraseña Generada: 123456789\nReestablecerla en el proximo acceso al sistema.');
                }
              };
              xhr.send(formData);
            });
          </script>

            </form>
            <?php
              }
              $mysqli->close();
              $stmt->close();
            ?>
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
        <div class="description">Decreto, Ley, o Normativa que acredita su creación</div>
        <div class="button-container2">
          <form method="post" action="saveDEC.php" enctype="multipart/form-data" id="form1">
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
          <form method="post" action="saveNRE.php" enctype="multipart/form-data" id="form2">
            <input type="file" name="file" id="upload-file2" style="display: none;">
            <input type="hidden" name="opcion" value="2">
            <input type="submit" value="Subir" class="upload-button">
          </form>
          <div class="selected-file" id="selected-file2"></div>
          <button onclick="uploadFile(2)" class="select-button">Seleccionar</button>
        </div>
      </div>

      <!-- Opcion Subir documentos -->
      <div class="gallery-item">
        <img src="./images/comprobantedomicilio.jpg" alt="Subir archivos">
        <div class="description">Comprobante de Domicilio de la Dependencia</div>
        <div class="button-container2">
          <form method="post" action="saveDOM.php" enctype="multipart/form-data" id="form3">
            <input type="file" name="file" id="upload-file3" style="display: none;">
            <input type="hidden" name="opcion" value="3">
            <input type="submit" value="Subir" class="upload-button">
          </form>
          <div class="selected-file" id="selected-file3"></div>
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
  <?php

    echo "<!-- Opcion Visualizar y crear solcitudes de vacantes/ solciitante alumnos-->";
    echo "<div class='gallery-item'>";
    echo "<img src='./images/identificacionoficial.jpg' alt='Solicitudes'>";
    echo "<div class='description'>Identificación Oficial</div>";
    echo "<div class='button-container2'>";
    echo "<form method='post' action='saveINE.php'  enctype='multipart/form-data' id='form4'>";
    echo "<input type='file' name='file' id='upload-file4' style='display: none;'>";
    echo "<input type='hidden' name='opcion' value='4'>";
    echo "<input type='submit' value='Subir' class='upload-button'>";
    echo "</form>";
    echo "<div class='selected-file' id='selected-file4'></div>";
    echo "<button onclick='uploadFile(4)' class='select-button'>Seleccionar</button>";
    echo "</div>";
    echo "</div>";

    echo "<!-- Opcion Visualizar Aspirantes-->";
    echo "<div class='gallery-item'>";
    echo "<img src='./images/RFC.png' alt='Aceptar/Rechazar Aspirantes'>";
    echo "<div class='description'>Registro Federal de Contribuyentes </div>";
    echo "<div class='button-container2'>";
    echo "<form method='post' action='saveRFC.php' enctype='multipart/form-data' id='form5'>";
    echo "<input type='file' name='file' id='upload-file5' style='display: none;'>";
    echo "<input type='hidden' name='opcion' value='5'>";
    echo "<input type='submit' value='Subir' class='upload-button'>";
    echo "</form>";
    echo "<div class='selected-file' id='selected-file5'></div>";
    echo "<button onclick='uploadFile(5)' class='select-button'>Seleccionar</button>";
    echo "</div>";
    echo "</div>";

    echo"</div>";
 ?>




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

  // Variable para almacenar el índice de la pestaña activa
  var activeTabIndex = 0;

  // Establecer el estado inicial (seleccionar la pestaña "Inicio" y mostrar su contenido)
  tabLinks[activeTabIndex].parentNode.classList.add('active');
  tabContents[activeTabIndex].classList.add('active');

  // Agregar un evento de clic a cada enlace
  tabLinks.forEach(function(link, index) {
    link.addEventListener('click', function(event) {
      event.preventDefault();


      // Obtener el ID del contenido asociado a la pestaña
      var targetId = this.getAttribute('href');

      // Quitar la clase 'active' de la pestaña y el contenido activos
      tabLinks[activeTabIndex].parentNode.classList.remove('active');
      tabContents[activeTabIndex].classList.remove('active');

      // Agregar la clase 'active' al enlace y al contenido seleccionados
      this.parentNode.classList.add('active');
      document.querySelector(targetId).classList.add('active');

      // Actualizar el índice de la pestaña activa
      activeTabIndex = index;
      // Verificar si ya se hizo clic en la pestaña activa
      if (activeTabIndex === 4) {
            <?php
                $id = $_SESSION['user'];

                $conn = mysqli_connect('localhost', 'u611167522_root', 'G3nU1n4M3nT3{]?_', 'u611167522_db_serviciosoc');

                $resultado = mysqli_query($conn, "SELECT COUNT(numConv) AS isExist FROM convenio WHERE codUserDepend = '$id'");
                $fila = mysqli_fetch_assoc($resultado);

                $exist = $fila["isExist"];

                if($exist == '1')
                {

                }
                else
                {
                  ?>

            alert("En estos momentos se encuentra en validacion su informacion.\nSe le informara lo mas pronto posible de nuestra respuesta.\nEste atento a su correo electronico.")

            // Redirigir a la pestaña con índice 0
            var redirectToTab = 0;
            if (redirectToTab >= 0 && redirectToTab < tabLinks.length) {
              // Quitar la clase 'active' de la pestaña y el contenido activos
              tabLinks[4].parentNode.classList.remove('active');
              tabContents[4].classList.remove('active');

              // Agregar la clase 'active' al enlace y al contenido seleccionados
              var manualActiveTab = tabLinks[0].parentNode;

              // Verifica si el elemento padre ya tiene la clase "active"
              if (!manualActiveTab.classList.contains('active')) {
                // Agrega la clase 'active' al elemento padre seleccionado manualmente
                manualActiveTab.classList.add('active');
                document.querySelector("#verificacion").classList.add('active');
              }
            }
            

            <?php 
                }
            ?>
      }
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
        const form = document.getElementById(`form${fileNumber}`);
        form.submit(); // Envía el formulario al archivo PHP correspondiente
      });
    }
  </script>

  <script>
      // Se obtiene el parametro enviado desde el PHP y se comprueba de que coincida con el argumento dado
		  const urlParams = new URLSearchParams(window.location.search);
		  const redirect = urlParams.get('redirect');

      // Se analiza si uno de los parametros es verdadero
      if (redirect === '1')
      {
        // Muestra el mensaje de alerta dado cuando el login falla
        alert("Decretos subidos correctamente.")
      }
      else if(redirect === '2')
      {
        // Muestra el mensaje de alerta dado cuando se regresa al login despues de un redireccionamiento
        alert("Nombramiento de representante subido correctamente.")
      }
      else if(redirect === '3')
      {
        // Muestra el mensaje de alerta dado cuando se regresa al login despues de un redireccionamiento
        alert("Comprobante de domicilio subido correctamente.")
      }
      else if(redirect === '4')
      {
        // Muestra el mensaje de alerta dado cuando se regresa al login despues de un redireccionamiento
        alert("Identificacion Oficial subida exitosamente.")
      }
      else if(redirect === '5')
      {
        // Muestra el mensaje de alerta dado cuando se regresa al login despues de un redireccionamiento
        alert("Registro Federal del Contribuyente subido exitosamente.")
      }
      
    </script>


</body>
</html>