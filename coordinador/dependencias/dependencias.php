<!DOCTYPE html>
<html lang="en">

  <head>
  
  <meta charset="utf-8">
	<title>Carrusel</title>
	<link rel="stylesheet" href="./dependencias.css">
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
                <li><a href="../coordinador.php">Crear cuenta</a></li>
                <li><a href="../documentos/documentos.php">Subir documentos</a></li>
                <li><a href="../alumno/alumno.php">Alumnos en servicio</a></li>
                <li><a href="../dependencias/dependencias.php">Dependencias</a></li>
                <li><a href="../solicitudes/solicitudes.php">Solicitudes</a></li>
                <li><a href="../../login/login.html">Cerrar sesión</a></li>
            </ul>
          </nav>
       </div>
    </header>

<!-- Boton para capturar id -->
    <div style="margin-top: 100px;">
      <form method="GET" action="">
        <label for="idDepend">Ingrese el valor de idDepend:</label>
        <input type="text" name="idDepend" id="idDepend">
        <input type="submit" value="Enviar">
      </form>
    </div>


<!-- Carrusel de imagenes -->
    <?php

    // Conectar a la base de datos
    $conn = mysqli_connect("localhost","root","","db_servicioSocial");

    // Verificar si hubo un error al conectar
    if (mysqli_connect_errno()) {
      die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los datos de los alumnos de la base de datos
    $resultado = mysqli_query($conn, "SELECT * FROM dependencia");

    // Generar el código HTML y CSS del carrusel
    echo '<div class="carousel-container">';
    echo '<div class="carousel">';
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo '<div class="carousel-item" data-carrera="' . $fila["tipoDepend"] . '">';
      echo '<img src="data:image/jpeg;base64,' . base64_encode($fila["logo"]) . '" alt="' . $fila["idDepend"] . '">';
      echo '<div class="alumno-info">';
      echo '<p class="alumno-nombre">' . $fila["idDepend"] . '</p>';
      echo '<p class="alumno-carrera">' . $fila["tipoDepend"] . '</p>';
      echo '<button class="btn-modal" data-alumno-id="' . $fila["idDepend"] . '">Ver detalles</button>';
      echo '</div>'; // Cierre de "alumno-info"
      echo '</div>'; // Cierre de "carousel-item"
    }
    echo '</div>'; // Cierre de "carrousel"



    
    // Generar el menú desplegable para filtrar por idDepend

    // Obtener el valor de idDepend enviado por el usuario
    $idDepend = isset($_GET['idDepend']) ? $_GET['idDepend'] : '';

    // Conectar a la base de datos
    $conn = mysqli_connect("localhost","root","","db_servicioSocial");

    // Verificar si hubo un error al conectar
    if (mysqli_connect_errno()) {
      die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Preparar la consulta SQL para obtener los datos de la dependencia con el idDepend seleccionado
    $sql = "SELECT * FROM dependencia WHERE idDepend = $idDepend";

    // Ejecutar la consulta SQL y guardar los resultados en una variable
    $resultado = mysqli_query($conn, $sql);

    // Generar el código HTML y CSS del carrusel
    echo '<div class="carousel-container">';
    echo '<div class="carousel">';
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo '<div class="carousel-item" data-carrera="' . $fila["tipoDepend"] . '">';
      echo '<img src="data:image/jpeg;base64,' . base64_encode($fila["logo"]) . '" alt="' . $fila["idDepend"] . '">';
      echo '<div class="alumno-info">';
      echo '<p class="alumno-nombre">' . $fila["idDepend"] . '</p>';
      echo '<p class="alumno-carrera">' . $fila["tipoDepend"] . '</p>';
      echo '<button class="btn-modal" data-alumno-id="' . $fila["idDepend"] . '">Ver detalles</button>';
      echo '</div>'; // Cierre de "alumno-info"
      echo '</div>'; // Cierre de "carousel-item"
    }
    echo '</div>'; // Cierre de "carousel-controls"
    echo '</div>'; // Cierre de "carousel-container"

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);

    ?>

<!-- Scripts para dar funcionalidad al carrusel -->
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
                        // Filtrar los elementos del carrusel al ingresar un id con checklist, por el momento no se utiliza
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
                // ...
                // Evento click en botón "Ver detalles" de cada alumno
                $('.btn-modal').click(function() {
                    var alumnoId = $(this).data('alumno-id');
                    $.ajax({
                    url: '../../functionsDB/visualizardependenciaimagenes.php',
                    type: 'POST',
                    data: {id: alumnoId},
                    success: function(response) {
                        // Mostrar ventana modal con la tabla de detalles
                        $('#modal').html(response);
                        $('#modal').modal('show');
                    },
                    error: function() {
                        alert('Error al cargar los detalles de la dependencia');
                    }
                    });
                });
                })

    </script>


    <!-- Ventana modal tablas -->
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