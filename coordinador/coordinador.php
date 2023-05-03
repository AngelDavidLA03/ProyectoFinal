<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
  
    <link rel="stylesheet" type="text/css" href="coordinador.css">

   <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
   <?php
        session_start();

        // Se comprueba si el Coordinador ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "Coordinador"))
        {
            header("location: ../login/login.html?redirect=true");
            session_destroy();
            exit;
        } 
    ?>
    



  <body>
    <!-- Menú superior-->
    <header>
      <div class="container1">
        <nav>
          <ul>
                      <li><a href="../coordinador/coordinador.php">Crear cuenta</a></li>
                      <li><a href="../coordinador/documentos/documentos.php">Subir documentos</a></li>
                      <li><a href="../coordinador/alumno/alumno.php">Alumnos en Servicio</a></li>
                      <li><a href="../coordinador/dependencias/dependencias.php">Dependencias</a></li>
                      <li><a href="../coordinador/solicitudes/solicitudes.php">Solicitudes</a></li>
                      <li><a href="../functionsDB/logout.php">Cerrar Sesión</a></li>
                  </ul>
              </nav>
          </div>
      </header>

    
      <div class="container">
        <h1>Crear nuevo usuario</h1>
        <form>
          <label for="email">Correo electrónico:</label>
          <input type="email" id="email" name="email" required>
  
          <label for="username">Nombre de usuario:</label>
          <input type="text" id="username" name="username" required>
  
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" required>
  
          <div class="checkbox-group">
            <input type="checkbox" id="alumno" name="tipo-cuenta" value="alumno">
            <label for="alumno">Alumno</label>
  
            <input type="checkbox" id="dependencia" name="tipo-cuenta" value="dependencia">
            <label for="dependencia">Dependencia</label>
          </div>
  
          <button type="submit">Crear</button>
        </form>
        
      </div>
    </body>


        
      
  </body>
</html>