<!DOCTYPE html>
<html lang="en">

  <head>
    <link rel="stylesheet" href="Syalumno.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Cuenta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="stylesolicitud.css">
    <!-- carrusel S -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
  <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
  <?php
        session_start();

        // Se comprueba si el Coordinador ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "Coordinador"))
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
                    <li><a href="../../coordinador/coordinador.php">Crear cuenta</a></li>
                    <li><a href="../../coordinador/documentos/documentos.php">Subir documentos</a></li>
                    <li><a href="../../coordinador/alumno/alumno.php">Alumnos en Servicio</a></li>
                    <li><a href="../../coordinador/dependencias/dependencias.php">Dependencias</a></li>
                    <li><a href="../../coordinador/solicitudes/solicitudes.php">Solicitudes</a></li>
                    <li><a href="../../functionsDB/logout.php">Cerrar Sesión</a></li>
              </ul>
          </nav>
      </div>
  </header>



  <div class="container2">

<!-- Carrusel alumnos-->
            <div class="carrusel">
                <div class="grid-x">
                  <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">

                      <div class="item">
                        <label for="doc1">
                          <img src="images/Angelica.png" alt="imagen1"> Angelica
                        </label>
                        <button id="popup-trigger"> Ver documentos </button>
                        <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>


                      <div class="item">
                        <label for="doc2">
                          <img src="images/Juan.jpg" alt="imagen 2"> Pablo Rocha
                        </label>
                        <button class="small hollow button">Ver documentos</button>
                         <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>


                      <div class="item">
                        <label for="doc3">
                          <img src="images/Laura.jpg" alt="imagen3">Laura
                        </label>
                        <button class="small hollow button">Ver documentos</button>
                        <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>


                      <div class="item">
                        <label for="doc4">
                          <img src="images/Pedro.jpg" alt="imagen4"> Ángel López
                        </label>
                        <button class="small hollow button">Ver documentos</button>
                         <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>


                      <div class="item">
                        <label for="doc5">
                          <img src="images/Samantha.jpeg" alt="imagen5"> Samantha
                        </label>
                        <button class="small hollow button">Ver documentos</button>
                         <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>
                    </div>

                  </div>
                </div>
              </div>


              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
              <script>
                $(document).ready(function(){
                  $('.owl-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    dots:true,
                    dotsEach:true,
                    responsive:{
                      0:{
                        items:1
                      },
                      600:{
                        items:2
                      },
                      1000:{
                        items:3
                      }
                    }
                  })
                });
              </script>
                </div>
              </div>
            </div>
        </div>


<!-- POUP DAtos-->
        <div id="popup-content" style="display:none;">
          <div class="row">
            <div class="col">
              <div class="card">
                <h3>Angelica</h3>
                <label>Especialidad:</label>
                <input type="text" value="Lic Contabilidad">
                <label>Departamento:</label>
                <input type="text" value="Contabilidad">
                <label>Jefe/Responsable:</label>
                <input type="text" value="Juan Pérez">
                <label>Horas Completadas:</label>
                <input type="text" value="180">

                <button onclick="window.open('../alumnos/PdfServicio/1nuevopresentacion_ss.pdf')">Carta Presentación</button>
                <button id="popup-close">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

      

        <script>
          var popup = document.getElementById("popup-content");
          var trigger = document.getElementById("popup-trigger");
          var closeButton = document.getElementById("popup-close");

          trigger.onclick = function() {
            if (popup.style.display === "none") {
              popup.style.display = "block";
            }
          };

          closeButton.onclick = function() {
            popup.style.display = "none";
          };
        </script>




        <!-- POPUP -->
        <div id="popup-container" class="modal-bg" style="display:none">
          <div class="modal">
            <h2> Solicitar cambio alumno</h2>
            <div class="reason">
              <h3>Seleccione la razón por la que dará de baja al alumno:</h3>
              <ul>
                <li><label><input type="checkbox" name="reason" value="inasistencia"> Baja por inasistencia</label></li>
                <li><label><input type="checkbox" name="reason" value="dependencia"> El alumno encontró otra dependencia</label></li>
                <li><label><input type="checkbox" name="reason" value="horarios"> El alumno no puede cumplir con los horarios</label></li>
                <li><label><input type="checkbox" name="reason" value="decision"> Por decisión de la dependencia</label></li>
                <li><label><input type="checkbox" name="reason" value="actividades"> El alumno no puede cumplir con las actividades</label></li>
              </ul>
            </div>
            <div class="comment">
              <h3>Escribe un breve motivo por el cual estás dando de baja al alumno:</h3>
              <textarea></textarea>
            </div>
            <div class="buttons">
              <button class="enviar">Enviar</button>
              <button class="cancelar">Cancelar</button>
            </div>
          </div>
        </div>

        <script>
          // Obtener el botón de activación del popup para solicitar cambio
          const popupTriggerCambio = document.querySelector('#popup-trigger-cambio');

          // Obtener el contenedor del popup
          const popupContainer = document.querySelector('#popup-container');

          // Obtener el botón de cancelar del popup
          const popupCancel = popupContainer.querySelector('.cancelar');

          // Función para mostrar el popup
          function showPopup() {
            console.log("Mostrar popup"); // Agrega este console.log() para verificar
            popupContainer.style.display = 'block';
          }

          // Función para ocultar el popup
          function hidePopup() {
            popupContainer.style.display = 'none';
          }

          // Agregar evento al botón de activación del popup para solicitar cambio
          popupTriggerCambio.addEventListener('click', showPopup);

          // Agregar evento al botón de cancelar del popup
          popupCancel.addEventListener('click', hidePopup);
        </script>

  </body>
</html>


