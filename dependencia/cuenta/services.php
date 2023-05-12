<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
  
    <link rel="stylesheet" type="text/css" href="./stylegaleria.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <title>Cuenta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    
    <!-- otros enlaces a archivos CSS y JS -->


<body>

<!-- Menú superior-->
<header>
    
  <div class="container1">
    <nav>
      <ul>
        <li><a href="../cuenta/services.php">Cuenta</a></li>
        <li><a href="../alumnos/alumno.php">Alumnos en Servicio</a></li>
        <li><a href="../NuevaSolicitud/Solicitud.php">Solicitud</a></li>
        <li><a href="../Convocatoria/Convocatoria.php">Convocatorias</a></li>
        <li><a href="../login/login.html">Cerrar Sesión</a></li>
      </ul>
     </nav>
   </div>
</header>


 <!-- Menú de Opciones lateral-->
    
 <div class="container">
  <div class="menu">
    <div class="menu-option active" data-tab="tab1">Datos Generales</div>
    <div class="menu-option" data-tab="tab2">Subir Documentos</div>
    <div class="menu-option" data-tab="tab3">Tramitar Convenio</div>
    <div class="menu-option" data-tab="tab4">Calendario</div>
  </div>

  <div class="content">

      <div id="tab1" class="tab-content" style="display: none;">
      <div class="card">
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

          <div class="profile-image-container">
            <div class="profile-image-wrapper">
              <img src="./tecnm.png" alt="Profile Image" class="profile-image">
            </div>
            <div class="profile-image-actions">
              <input type="file" id="profile-image-input" accept="image/*" onchange="previewProfileImage(event)">
              <label for="profile-image-input" class="profile-image-label"><i class="fas fa-camera"></i></label>
            </div>
          </div>

    </div>


    <div id="tab2" class="tab-content" style="display: none;">

      <div class="grid-x">
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme">
            <div class="item">
              <div class="image-container">
                <label for="doc1">
                  <img src="./images/decreto.jpg" alt="imagen1" />
                </label>
                <p>Copia del decreto, ley, acuerdo o la normativa que acredita su creación.</p>
                <input type="file" id="doc1" name="archivo1" accept=".pdf" required/>
                <span class="error">Por favor, sube un archivo en formato PDF.</span>
              </div>
            </div>
            <div class="item">
              <div class="image-container">
                <label for="doc2">
                  <img src=".images/representante.jpg" alt="imagen2" />
                </label>
                <p>Copia del nombramiento del representante de la dependencia</p>
                <input type="file" id="doc2" name="archivo2" accept=".pdf" required/>
                <span class="error">Por favor, sube un archivo en formato PDF.</span>
              </div>
            </div>
            <div class="item">
              <div class="image-container">
                <label for="doc3">
                  <img src="./images/identificacionoficial.jpg" alt="imagen3" />
                </label>
                <p>Copia de identificación oficial del representante</p>
                <input type="file" id="doc3" name="archivo3" accept=".pdf,.jpg,.jpeg" required/>
                <span class="error">Por favor, sube un archivo en formato PDF, JPG o JPEG.</span>
              </div>
            </div>
            <div class="item">
              <div class="image-container">
                <label for="doc4">
                  <img src="./images/comprobante.jpg" alt="imagen4" />
                </label>
                <p>Comprobante de domicilio de la dependencia</p>
                <input type="file" id="doc4" name="archivo4" accept=".pdf,.jpg,.jpeg" required/>
                <span class="error">Por favor, sube un archivo en formato PDF, JPG o JPEG.</span>
              </div>
            </div>
            <div class="item">
              <div class="image-container">
                <label for="doc5">
                  <img src="./images/RFC.png" alt="imagen5" />
                </label>
                <p>Copia del registro federal de contribuyentes (RFC) de la dependencia</p>
                <input type="file" id="doc5" name="archivo5" accept=".pdf" required/>
                <span class="error">Por favor, sube un archivo en formato PDF.</span>
              </div>
            </div>
          </div>
          <div class="btn-container">
            <button type="submit">Enviar documentos</button>
          </div>
        </div>
      </div>
    </div>


      <div id="tab3" class="tab-content" style="display: none;">

        <img src="./assets/images/service_03.jpg" alt="">
                  <h4>Para más información</h4>
                  <p>Las empresas y dependencias que deseen solicitar alumnos, para realizar su servicio social y práctica profesional, deberán celebrar un convenio de colaboración.
                  <br><br>Para más información abrir el siguiente enlace:</p>
          
                  <a href="http://www.serviciosocial.buap.mx/content/informaci%C3%B3n-para-tr%C3%A1mite-de-convenio" target="_blank">Trámite de convenio</a>
                    <br><br>
      
        </div>
      </div>
    
    
        <div id="tab4" class="tab-content" style="display: none;">
        <img src="./assets/images/calen2023.png" alt="">
                  <br><br>
        </div>
     
   


    <!-- Script carrusel subir documentos -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            merge:false, // agregar esta opción
            responsive:{
                0:{
                    items:1
                },
            }
        });
        </script>
          

        <script>
          // Obtiene todos los botones del menú lateral
          var menuButtons = document.querySelectorAll('.menu-option');

          // Agrega un controlador de eventos a cada botón
          menuButtons.forEach(function(button) {
          button.addEventListener('click', function() {
            // Oculta todas las pestañas
            var tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(function(tab) {
              tab.style.display = 'none';
            });

            // Obtiene la pestaña correspondiente al botón y la muestra
            var tabId = button.getAttribute('data-tab');
            var tabToShow = document.querySelector('#' + tabId);
            tabToShow.style.display = 'block';
          });
        });
        </script>

          
      
  </body>
</html>

