<!DOCTYPE html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <title>Cuenta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    
    <!-- otros enlaces a archivos CSS y JS -->
    <link rel="stylesheet" type="text/css" href="../cuenta/stylegaleria.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    
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

    <style>

      /*Carrusel en la izquierda */
      .grid-x {
        max-width: 800px; /* ajusta el ancho máximo según tus necesidades */
        margin: 0 auto; /* centra el contenedor horizontalmente */
        text-align: left; /* alinea el contenido a la izquierda */
      }

      /* Tamaño imagenes carrusel*/
      .item img {
      max-width: 100%;
      max-height: 150px;
      object-fit: contain;
    }

    

    </style>
  </head>


  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Menú superior-->
   
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><h2>Registro</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="../NuevaSolicitud/Solicitud.php">Nueva Solicitud
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../alumnos/alumno.php">Alumnos en Servicio</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../cuenta/services.php">Registro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Convocatoria/Convocatoria.php">Solicitudes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../functionsDB/logout.php">Cerrar Sesión</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>


       <!-- Page Content -->
       <div class="page-heading header-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>REGISTRO</h1>
              <span>DATOS y DOCUMENTOS</span>
            </div>
          </div>
        </div>
      </div>


    <!-- Menú de Opciones lateral-->
    <div class="single-services">
      <div class="container">
        <div class="row" id="tabs">
          <div class="col-md-4">
            <ul>
              <li><a href='#tabs-1'>Datos Generales <i class="fa fa-angle-right"></i></a></li>
              <li><a href='#tabs-2'>Subir Documentos <i class="fa fa-angle-right"></i></a></li>
              <li><a href='#tabs-3'>Tramitar Convenio <i class="fa fa-angle-right"></i></a></li>
              <li><a href='#tabs-4'>Calendario<i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>

    <!-- Contenido lateral del menú de opciones-->      
          <div class="col-md-8">
            <section class='tabs-content'>

    <!-- Contenido relacionado a Datos Dependencia-->          
              <article id='tabs-1'>
                <div class="card">
                  <div class="title-container">
                    <h2 color="white">Datos Dependencia</h2>
                  </div>
                  <div class="content-container">
                    <form>
                      <label>Nombre Dependencia:</label>
                      <input type="text" name="street" style="text-transform: uppercase;" required>
                
                      <label>Nombre Representante:</label>
                      <input type="text" name="outdoor-number" style="text-transform: uppercase;" required>
                
                      <label>RFC Dependencia:</label>
                      <input type="text" name="cologne" style="text-transform: uppercase;" required>
                
                      <label>Email:</label>
                      <input type="text" name="postal-code" style="text-transform: uppercase;" required>
                
                      <label>Teléfono:</label>
                      <input type="text" name="municipality" style="text-transform: uppercase;" required>
                
                      <div class="button-container">
                        <button type="submit">Guardar</button>
                        <button type="button" onclick="hidePopup()">Cancelar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </article>
         

        <!-- Contenido relacionado a  Carrusel subir documentos-->    
 
                <article id="tabs-2">
                  <div class="grid-x">
                    <div class="large-12 columns">
                      <div class="owl-carousel owl-theme">
                        <div class="item">
                          <div class="image-container">
                            <label for="doc1">
                              <img src="./images/decreto.jpg" alt="imagen1" />
                            </label>
                            <p>Copia del decreto, ley, acuerdo o la normativa que acredita su creación.</p>
                            <input type="file" id="doc1" name="archivo1" />
                          </div>
                        </div>
                        <div class="item">
                          <div class="image-container">
                            <label for="doc2">
                              <img src="./images/representante.jpg" alt="imagen2" />
                            </label>
                            <p>Copia del nombramiento del representante de la dependencia</p>
                            <input type="file" id="doc2" name="archivo2" />
                          </div>
                        </div>
                        <div class="item">
                          <div class="image-container">
                            <label for="doc3">
                              <img src="./images/identificacionoficial.jpg" alt="imagen3" />
                            </label>
                            <p>Copia de identificación oficial del representante</p>
                            <input type="file" id="doc3" name="archivo3" />
                          </div>
                        </div>
                        <div class="item">
                          <div class="image-container">
                            <label for="doc4">
                              <img src="./images/comprobantedomicilio.jpg" alt="imagen4" />
                            </label>
                            <p>Copia del comprobante de domicilio de la dependencia</p>
                            <input type="file" id="doc4" name="archivo4" />
                          </div>
                        </div>
                        <div class="item">
                          <div class="image-container">
                            <label for="doc5">
                              <img src="./images/RFC.png" alt="imagen5" />
                            </label>
                            <p>Copia del registro federal de contribuyentes (RFC) de la dependencia</p>
                            <input type="file" id="doc5" name="archivo5" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="btn-container">
                      <button type="submit">Enviar documentos</button>
                    </div>
                  </div>
                </article>
                
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
                <script>
                    $('.owl-carousel').owlCarousel({
              loop:true,
              margin:10,
              nav:true,
              merge:false,
              responsive:{
                  0:{
                      items:1
                  },
              }
          });
         </script>
                
                          
            <!-- Contenido relacionado a Tramitar cinevenio-->    
                <article id='tabs-3'>
                  <img src="assets/images/single_service_03.jpg" alt="">
                  <h4>Para más información</h4>
                  <p>Las empresas y dependencias que deseen solicitar alumnos, para realizar su servicio social y práctica profesional, deberán celebrar un convenio de colaboración.
                  <br><br>Para más información abrir el siguiente enlace:</p>
          
                  <a href="http://www.serviciosocial.buap.mx/content/informaci%C3%B3n-para-tr%C3%A1mite-de-convenio" target="_blank">Trámite de convenio</a>
                    <br><br>
                </article>
                
  <!-- Contenido relacionado a Calendario-->    
                <article id='tabs-4'>
                  <img src="assets/images/calen2023.png" alt="">
                  <br><br>
                </article>

                  </section>
                </div>
              </div>
            </div>
          </div>
    
          <script>
            $(document).ready(function() {
            $("#tabs-2 .item").owlCarousel({
              loop: true,
              margin: 20,
              nav: true,
              dots: false,
              navText: ['<span class="icon-arrow_back"></span>', '<span class="icon-arrow_forward"></span>'],
              responsive: {
                0: {
                  items: 1
                },
                600: {
                  items: 2
                },
                1000: {
                  items: 3
                }
              }
            });
          });
          </script>              

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>