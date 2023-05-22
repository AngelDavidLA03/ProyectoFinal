<!DOCTYPE html>
<html lang="en">

  <head>
  
  <meta charset="utf-8">
	<title>Carrusel</title>
	<link rel="stylesheet" href="./stylesolicitud.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
   
  <!-- Enlace al archivo JS de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <!-- Enlace al archivo JS de jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Enlace al archivo JS de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

  </head>



  <body>

<!-- Menú superior-->
        <header>
            <div class="container">
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

<!-- Boton para capturar id -->
        <div style="margin-top: 100px;">
          <form method="GET" action="">
            <label for="matricula">Ingrese el id del Alumno:</label>
            <input type="text" name="matricula" id="matricula">
            <input type="submit" value="Enviar">
          </form>
        </div>

 
<!-- Carrusel de imagenes -->
    <?php

    // Conectar a la base de datos
    $conn = mysqli_connect("localhost", "root", "AdLa20031108", "db_serviciosocial");

    // Verificar si hubo un error al conectar
    if (mysqli_connect_errno()) {
      die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos de los alumnos de la base de datos
    $resultado = mysqli_query($conn, "SELECT * FROM alumno");

    // Generar el código HTML y CSS del carrusel
    echo '<div class="carousel-container">';
    echo '<div class="carousel">';
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo '<div class="carousel-item" data-carrera="' . $fila["especialidad"] . '">';
      echo '<img src="data:image/jpeg;base64,' . base64_encode($fila["foto"]) . '" alt="' . $fila["matricula"] . '">';
      echo '<div class="alumno-info">';
      echo '<p class="alumno-nombre">' . $fila["matricula"] . '</p>';
      echo '<p class="alumno-carrera">' . $fila["especialidad"] . '</p>';
      echo '<button class="btn-modal" data-alumno-id="' . $fila["matricula"] . '">Ver detalles</button>';
      echo '</div>'; // Cierre de "alumno-info"

      echo '</div>'; // Cierre de "carousel-item"
    }
    echo '</div>'; // Cierre de "carousel"



    //Generar el apartado para que el usuario ingrese el id del alumno y filtrarlo
    if(isset($_GET['matricula']) && !empty($_GET['matricula']))
    {
      // Obtener el valor de matricula enviado por el usuario
      $matricula = isset($_GET['matricula']) ? $_GET['matricula'] : '';

      // Conectar a la base de datos
      $conn = mysqli_connect("localhost","root","AdLa20031108","db_servicioSocial");

      // Verificar si hubo un error al conectar
      if (mysqli_connect_errno()) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
      }

      //Consulta SQL para obtener los datos del alumno con la matricula seleccionada
      $sql = "SELECT * FROM alumno WHERE matricula = $matricula";


      // Ejecutar la consulta SQL y guardar los resultados en una variable
      $resultado = mysqli_query($conn, $sql);

      // Generar el código HTML y CSS del carrusel
      echo '<div class="carousel-container">';
      echo '<div class="carousel">';
      while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<div class="carousel-item" data-carrera="' . $fila["especialidad"] . '">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($fila["foto"]) . '" alt="' . $fila["matricula"] . '">';
        echo '<div class="alumno-info">';
        echo '<p class="alumno-nombre">' . $fila["matricula"] . '</p>';
        echo '<p class="alumno-carrera">' . $fila["especialidad"] . '</p>';
        echo '<button class="btn-modal" data-alumno-id="' . $fila["matricula"] . '">Ver detalles</button>';
        echo '</div>'; // Cierre de "alumno-info"

        echo '</div>'; // Cierre de "carousel-item"
      }
      echo '</div>'; // Cierre de "carousel"
    }
     // Cerrar la conexión a la base de datos
     mysqli_close($conn);
    ?>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
    $(document).ready(function(){
      $('.carousel').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
                        arrows: false,
                        dots: true
                        }
                        },
                        {
                        breakpoint: 576,
                        settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true
                        }
                        }
                        ]
                        });

                        /*
                        // Filtrar los elementos del carrusel al seleccionar una carrera
                        $("#carrera-filtro").change(function() {
                            var carrera = $(this).val();
                            if (carrera === "todos") {
                                $(".carousel-item").show();
                            } else {
                                $(".carousel-item").hide();
                                $(".carousel-item .alumno-carrera:contains('" + carrera + "')").parent().show();
                            }
                        });
                        */
                        });
    </script>


    <!-- Funcionalidad detalles -->
    <script> 

                $(document).ready(function() {
               
                // Evento click en botón "Ver detalles" de cada alumno
                $('.btn-modal').click(function() {
                    var alumnoId = $(this).data('alumno-id');
                    $.ajax({
                    url: '../../functionsDB/visualizaralumnosimagenes.php',
                    type: 'POST',
                    data: {id: alumnoId},
                    success: function(response) {
                        // Mostrar ventana modal con la tabla de detalles
                        $('#modal').html(response);
                        $('#modal').modal('show');
                    },
                    error: function() {
                        alert('Error al cargar los detalles del alumno');
                    }
                    });
                });
                })
    </script>


    <!-- Ventana modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          
          <div class="modal-body">
            <!-- Contenido de la tabla de detalles -->
          </div>

        </div>
      </div>
    </div>        

  </body>
</html>
