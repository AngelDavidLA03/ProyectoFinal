<!DOCTYPE html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Cuenta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="dependencias.css">
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
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "COORDINADOR"))
        {
            header("location: ../../login/login.html?redirect=true");
            session_destroy();
            exit;
        } 
    ?>

    <!-- Estilo para el texto del menú -->
    <style>
        .navbar-nav .nav-link {
        color: black !important;
        }

        .navbar-brand h2 {
            color: #94C639 !important;;
        }
        .navbar-nav .nav-link {
            color: black !important;;
        }
  

        .owl-item {
          margin: 0 10px;
        }

        .owl-item img {
          max-width: 100%;
          height: 250px;
          object-fit: cover;
          border: 2px solid blue;
          border-radius: 50%;
        }

        .owl-dots {
          text-align: center;
          margin-top: 20px;
          bottom: -20px;
        }

        .owl-dot {
          display: inline-block;
          width: 10px;
          height: 10px;
          margin: 0 5px;
          border-radius: 50%;
          background-color: #ccc;
          cursor: pointer;
        }

        .owl-dot.active {
          background-color: #333;
        }

        .btn-container {
          text-align: center;
          margin-top: 20px;
        }

        .btn-container button {
          background-color: green;
          color: white;
          font-size: 16px;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }

        .owl-item.active img {
          background-color: yellow;
        }

        .owl-prev, .owl-next {
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
          margin-top: 0;
        }

        .owl-prev {
          left: 0;
        }

        .owl-next {
          right: 0;
        }

        .owl-carousel .owl-nav button.owl-prev:before, .owl-carousel .owl-nav button.owl-next:before {
          font-size: 30px;
          color: #000;
        }

        .owl-carousel .owl-nav button.owl-prev:before {
          content: "<";
        }

        .owl-carousel .owl-nav button.owl-next:before {
          content: ">";
        }

        .owl-carousel .owl-nav button.owl-prev:focus, .owl-carousel .owl-nav button.owl-next:focus {
          outline: none;
        }

        .owl-dots,
        .btn-container {
          margin-top: -150px;
        }

        .owl-prev:hover, .owl-next:hover {
          background-color: rgba(255, 0, 0, 0.8);
          border-color: rgba(255, 0, 0, 0.8);
        }


        /* items carrusel*/
        .owl-carousel .item {
        width: 50%;
        text-align: center;
        }

        .owl-carousel img {
        max-width: 100%;
        height: 250px;
        }

        .owl-carousel button {
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 5px 20px;
        background-color: #94C639;
        color: #fff;
        border-radius: 5px;
        }

        .owl-carousel button:first-child {
        margin-right: 5px;
        }


        .owl-carousel label {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: bold;
        }

      

    /* margen/distancia superior*/
                .container {
            margin-top: -40px;
            }

            .carrusel{
            margin-top: 80px;
            }


      /* POPUP*/
			.modal-bg {
			position: fixed;
			z-index: 999;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.modal {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
		}

		.modal h2 {
			margin-top: 0;
		}

		.search {
			margin-bottom: 10px;
		}

		.reason {
			margin-bottom: 10px;
		}

		.reason ul {
			list-style: none;
			margin: 1px;
			padding: 0;
		}

		.reason li {
		margin-bottom: 5px;
		}

		.reason label {
		display: inline-block;
		margin-left: 5px;
		}

		.comment textarea {
		width: 100%;
		height: 100px;
		padding: 5px;
		margin-top: 5px;
		border: 1px solid #ccc;
		border-radius: 3px;
		resize: none;
		}

		.buttons {
		text-align: center;
		}

		.buttons button {
		margin: 5px;
		padding: 5px 10px;
		border: none;
		border-radius: 3px;
		background-color: #0077cc;
		color: #fff;
		cursor: pointer;
		}

		.buttons button:hover {
		background-color: #005da8;
		}

		.cancelar {
		background-color: #ccc;
		color: #000;
		}

		.cancelar:hover {
		background-color: #999;
		}
	/* Termina POPUP*/


      /*Cards*/
      .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      }

      .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 0 -10px;
      }

      .col {
      width: calc(33.33% - 20px);
      margin: 0 10px;
      padding: 20px;
      border-radius: 10px;
      background-color: #f7f7f7;
      }

      .card {
      border-radius: 10px;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .card h3 {
      margin-top: 0;
      }

      .card p {
      margin: 0;
      line-height: 1.5;
      }

      .card a {
      color: #007bff;
      text-decoration: none;
      }

      .card a:hover {
      text-decoration: underline;
      }


	/* Cartas de alumnos */	
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }

      .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #cccccc;
        padding: 20px;
        margin-bottom: 20px;
		    border: 10px solid #99CC33;
        
      }
      .card h3 {
        color: #fff;
        background-color: #003366;
        padding: 10px;
        margin-top: 0;
        margin-bottom: 20px;
        border-radius: 5px 5px 0px 0px;
      }
      .card label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
      }
      .card input {
        display: block;
        margin-bottom: 20px;
        width: 95%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        font-size: 20px;
        background-color: #333333;
        color: #fff;
      }
      .card button {
        background-color: #99cc33;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-right: 10px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
      }
      .card button:hover {
        background-color: #006633;
      }

      #popup-content {
      z-index: 9999;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

      #popup-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 80%;
      height: 70%;
      overflow: auto;
      z-index: 9999;
    }

      #popup-content .card {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      height: 90%;
      background-color: white;
      border: 8px solid #003366;
      padding: 20px;
      overflow: auto;
    }

    /* Cambiar de color botones saber mas y cambio*/
    button:hover {
      background-color: #003366;
    }

    </style>
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




<!-- Carrusel alumnos-->
            <div class="carrusel">
                <div class="grid-x">
                  <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">

                      <div class="item">
                        <label for="doc1">
                          <img src="../dependencias/images/empresa1.jpg" alt="imagen1">Empresa1
                        </label>
                        <button id="popup-trigger"> Ver documentos </button>
                        <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>


                      <div class="item">
                        <label for="doc2">
                          <img src="../dependencias/images/empresa2.jpg" alt="imagen 2"> Empresa2
                        </label>
                        <button class="small hollow button">Ver documentos</button>
                         <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>


                      <div class="item">
                        <label for="doc3">
                          <img src="../dependencias/images/empresa3.png" alt="imagen3">Empresa3
                        </label>
                        <button class="small hollow button">Ver documentos</button>
                        <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>


                      <div class="item">
                        <label for="doc4">
                          <img src="../dependencias/images/empresa4.jpg" alt="imagen4">Empresa4
                        </label>
                        <button class="small hollow button">Ver documentos</button>
                         <!-- <button id="popup-trigger-cambio">Solicitar Cambio</button> -->
                      </div>


                      <div class="item">
                        <label for="doc5">
                          <img src="../dependencias/images/empresa5.jpg" alt="imagen5"> Empresa5
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


