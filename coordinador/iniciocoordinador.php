<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Bienvenida Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
    <link rel="stylesheet" type="text/css" href="../coordinador/iniciocoordinador.css">

</head>    


<body>
<div class="container">
    <div class="title">Bienvenido Administrador</div>
    <div class="subtitle">¡Gracias por utilizar nuestro sistema!</div>
    
    <div class="buttons">
      <a href="../coordinador/solicitudes/solicitudes.php" class="button button-solicitudes">
        <i class="button-icon fas fa-list-alt"></i>
        <div class="button-text">Solicitudes</div>
      </a>
      <a href="../coordinador/documentos/documentos.php" class="button button-subir-documentos">
        <i class="button-icon fas fa-upload"></i>
        <div class="button-text">Subir documentos</div>
      </a>
      <a href="../coordinador/alumno/alumno.php" class="button button-alumnos-servicio">
        <i class="button-icon fas fa-users"></i>
        <div class="button-text">Alumnos en Servicio</div>
      </a>
      <a href="../coordinador/dependencias/dependencias.php" class="button button-dependencias">
        <i class="button-icon fas fa-building"></i>
        <div class="button-text">Dependencias</div>
      </a>
      <a href="../login/login.html" class="button button-cerrar-sesion">
        <i class="button-icon fas fa-sign-out-alt"></i>
        <div class="button-text">Cerrar Sesión</div>
      </a>
    </div>
  </div>

  <script>
    window.addEventListener('DOMContentLoaded', function() {
      var container = document.querySelector('.container');
      container.classList.add('show');
    });
  </script>
</body>
</html>