<!DOCTYPE html>
<html>
<head>
  <title>Menú de usuario desplegable</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleestudiante.css">
<<<<<<< HEAD
  <body onload="disableScroll()">

</head>
<body>
  <div class="header">
    <h2 class="centered-heading">PORTAL</h2>
=======

    <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
    <?php
        session_start();

        // Se comprueba si el Coordinador ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "ALUMNO"))
        {
            header("location: ../login/login.html?redirect=true");
            session_destroy();
            exit;
        } 
    ?>
  
</head>
<body>
  <div class="header">
    <h2 class="centered-heading">Mi Portal</h2>
>>>>>>> f034c909cfb86cc45e0a322e9465d2331cd1bbf0
    <div class="user-menu">
      <a href="#" class="user-icon"><img src="https://via.placeholder.com/150" alt="User"></a>
      <ul class="dropdown-menu">
        <li><a href="#" class="menu-option">Perfil</a></li>
        <li><a href="#" class="menu-option">Configuración</a></li>
<<<<<<< HEAD
        <li><a href="..//login/login.html" class="menu-option">Cerrar sesión</a></li>
=======
        <li><a href="../functionsDB/logout.php" class="menu-option">Cerrar sesión</a></li>
>>>>>>> f034c909cfb86cc45e0a322e9465d2331cd1bbf0
      </ul>
    </div>
  </div>
  
<!--    Cuadros  -->
<div class="container-2">
 <br>
<<<<<<< HEAD
  <p class="centered-subheading">Servicio Social</p>
  <p class="centered-subheading"> El Servicio Social es obligatorio y consta de 480 horas que se deben completar 
  durante los semestres V, VI y VII, así como en veranos. Para iniciar el servicio 
  social en el quinto semestre, se requiere haber aprobado al menos el 57% de las 
  materias de la currícula. Es necesario completar todas las horas antes del octavo
  semestre y para participar en programas de movilidad académica. </p>



=======
  <p class="centered-subheading">Lorem Ipsum es simplemente un texto ficticio de la industria de la impresión y la composición tipográfica. Lorem Ipsum ha sido el texto ficticio estándar de la industria desde el año 1500.</p>
>>>>>>> f034c909cfb86cc45e0a322e9465d2331cd1bbf0
  <div data-delay="4000" data-animation="slide" class="team-slider-wrapper w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="12" data-duration="500" data-infinite="true">
      <div class="w-slider-mask">
          <div class="team-slide-wrapper w-slide">
              <div class="team-block">
<<<<<<< HEAD
                  <img src="servicio1.png" loading="lazy" alt="" class="team-member-image-two"/>
                  <div class="team-block-info">
                      <h3 class="team-member-name-two">Solicitar servicio social </h3>
                      <p class="team-member-text"> <br>  
                                                        Comienza explorando organizaciones sin fines de lucro, centros comunitarios, 
                                                        hospitales o instituciones educativas en tu área.
=======
                  <img src="servicio.png" loading="lazy" alt="" class="team-member-image-two"/>
                  <div class="team-block-info">
                      <h3 class="team-member-name-two">Solicitar servicio social </h3>
                      <p class="team-member-text"> <br> Busca y encuentra tu servicio social
>>>>>>> f034c909cfb86cc45e0a322e9465d2331cd1bbf0
                                               </p>
                      
                      <a href="#" class="text-link-arrow w-inline-block">
                          <div>Ir </div>
                          <div class="arrow-embed w-embed">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor"/>
                              </svg>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          <div class="team-slide-wrapper w-slide">
              <div class="team-block">
<<<<<<< HEAD
                  <img src="documentacion.jpg" loading="lazy" alt="" class="team-member-image-two"/>
=======
                  <img src="esc.avif" loading="lazy" alt="" class="team-member-image-two"/>
>>>>>>> f034c909cfb86cc45e0a322e9465d2331cd1bbf0
                  <div class="team-block-info">
                    <h3 class="team-member-name-two">Documentacion</h3>
                      <p class="team-member-text">Sube tus documentos.
                                               <br>&#11044 Carta de presentacion
                                               <br>&#11044 Constancia de estudios
                                               <br>&#11044 Carta de presentacion</p></p>
                      <a href="#" class="text-link-arrow w-inline-block">
                          <div>Ir</div>
                          <div class="arrow-embed w-embed">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor"/>
                              </svg>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          <div class="team-slide-wrapper w-slide">
              <div class="team-block">
<<<<<<< HEAD
                  <img src="reporte.jpg" loading="lazy" alt="" class="team-member-image-two"/>
                  <div class="team-block-info">
                      <h3 class="team-member-name-two">Reporte</h3>
                      <p class="team-member-text">
                        Es importante realizar y entregar tus reportes a tiempo. Estos informes son herramientas fundamentales para evaluar el progreso y tomar decisiones informadas.</p>
                        <a href="../Alumno/reportes/reportes.php" class="text-link-arrow w-inline-block">
                            <div>Ir</div>
                            <div class="arrow-embed w-embed">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
         
=======
                  <img src="esc.avif" loading="lazy" alt="" class="team-member-image-two"/>
                  <div class="team-block-info">
                      <h3 class="team-member-name-two">Full Name</h3>
                      <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="text-link-arrow w-inline-block">
                          <div>Ir</div>
                          <div class="arrow-embed w-embed">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor"/>
                              </svg>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          <div class="team-slide-wrapper w-slide">
              <div class="team-block">
                  <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two"/>
                  <div class="team-block-info">
                      <h3 class="team-member-name-two">Full Name</h3>
                      <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="text-link-arrow w-inline-block">
                          <div>Ir</div>
                          <div class="arrow-embed w-embed">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor"/>
                              </svg>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          <div class="team-slide-wrapper w-slide">
              <div class="team-block">
                  <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two"/>
                  <div class="team-block-info">
                      <h3 class="team-member-name-two">Full Name</h3>
                      <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="text-link-arrow w-inline-block">
                          <div>Ir</div>
                          <div class="arrow-embed w-embed">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor"/>
                              </svg>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          <div class="team-slide-wrapper w-slide">
              <div class="team-block">
                  <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two"/>
                  <div class="team-block-info">
                      <h3 class="team-member-name-two">Full Name</h3>
                      <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="text-link-arrow w-inline-block">
                          <div>Ir</div>
                          <div class="arrow-embed w-embed">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor"/>
                              </svg>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
>>>>>>> f034c909cfb86cc45e0a322e9465d2331cd1bbf0
      </div>
      <div class="team-slider-arrow w-slider-arrow-left">
          <div class="w-icon-slider-left"></div>
      </div>
      <div class="team-slider-arrow w-slider-arrow-right">
          <div class="w-icon-slider-right"></div>
      </div>
      <div class="team-slider-nav w-slider-nav w-slider-nav-invert w-round"></div>
  </div>
</div>
</section>
<script>
    const userIcon = document.querySelector('.user-icon');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    userIcon.addEventListener('click', () => {
      dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });
  </script>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6453cfe21e6a1239bc5fd388" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://uploads-ssl.webflow.com/6453cfe21e6a1239bc5fd388/js/webflow.4e19aa26d.js" type="text/javascript"></script>
<!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
<<<<<<< HEAD

<script>
    function disableScroll() {
      document.body.style.overflow = 'hidden';
      document.documentElement.style.overflow = 'hidden';
    }</script>
=======
>>>>>>> f034c909cfb86cc45e0a322e9465d2331cd1bbf0
</body>
</html>
