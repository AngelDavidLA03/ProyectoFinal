<!DOCTYPE html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Aceptar solicitudes pendientes</title>

    <link rel="stylesheet" type="text/css" href="solicitudes.css">

    <!-- PROTECCION DE ACCESO A LA PAGINA Y REDIRECCIONAMIENTO AL LOGIN -->
    <?php/*
          session_start();

          // Se comprueba si el Coordinador ha iniciado sesion
          if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "Coordinador"))
          {
              header("location: ../../login/login.html?redirect=true");
              session_destroy();
              exit;
          } */
    ?>

    <header>
      <div class="containers">
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
  </head>
  <body>

  
  
    <div class="container">
      <h1>Renovar Convenio</h1>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Tipo de cuenta</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Empresa1</td>
            <td>Empresa1@gmail.com</td>
            <td>Dependencia</td>
            <td class="btn-group">
              <button>Aceptar</button>
              <button class="reject-btn">Rechazar</button>
            </td>
          </tr>
          <tr>
            <td>Empresa2</td>
            <td>Empresa2@outlook.com</td>
            <td>Dependencia</td>
            <td class="btn-group">
              <button>Aceptar</button>
              <button class="reject-btn">Rechazar</button>
            </td>
          </tr>
          <!-- Agregar más filas según sea necesario -->
        </tbody>
      </table>
    </div>
  </body>
</html>
