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


    <!-- Estilo para el texto del menú -->
    <style>
          /*
          .navbar-nav .nav-link {
          color: black !important;
          }

          .navbar-brand h2 {
              color: #94C639 !important;;
          }
          .navbar-nav .nav-link {
              color: black !important;;
          }
    
          */


          /* CSS Estilos Carrusel imagenes */
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

          /* Termina CSS Estilos Carrusel imagenes */

         /* Botón para subir documentos */

          .btn-container {
            text-align: center;
            margin-top: 10px;
          }

          .btn-container button {
            background-color: #94C639;
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

          owl-next {
          font-size: 2em;
          color: #fff;
          background-color: rgba(0, 0, 0, 0.5);
          padding: 10px;
          border-radius: 50%;
        }

        .owl-prev:hover,
        .owl-next:hover {
          background-color: rgba(0, 0, 0, 0.8);
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
                        <li><a href="../../ functionsDB/logout.php">Cerrar Sesión</a></li>
                    </ul>
                </nav>
            </div>
    </header>


    
    <div class="container">
    <h1>Subir documentos</h1>
      
    <div class="grid-x">
      <div class="large-12 columns">
        <div class="owl-carousel owl-theme">

          <div class="item">
            <label for="doc1">
              <img src="./images/cartapresentacion.jpg" alt="imagen1">
              <p>Formato Carta Presentación</p>
            </label>
            <input type="file" id="doc1" name="archivo1"/>
          </div>

          <div class="item">
            <label for="doc2">
              <img src="./images/reporte.jpg" alt="imagen2">
              <p>Formato Reporte de Actividades/Avance</p>
            </label>
            <input type="file" id="doc2" name="archivo2"/>
          </div>

          <div class="item">
            <label for="doc3">
              <img src="./images/cartaliberacion.jpg" alt="imagen3">
              <p>Carta Liberación Servicio Social</p>
            </label>
            <input type="file" id="doc3" name="archivo3" />
          </div>
      
      </div>
    </div>
    </div>

    <div class="btn-container">
    <button type="submit">Subir</button> 
    </div>
  
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <script>
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      dots:true,
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
    });
    </script>
    
    </div>

      
  </body>
</html>