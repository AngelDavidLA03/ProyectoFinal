<!DOCTYPE html>
<html>
<head>
  <title>Reporte</title>
  <link rel="stylesheet" href="stylereporte.css">
</head>
<body>
  <div class="header">
    <h2 class="centered-heading">PORTAL</h2>
    <div class="user-menu">
      <a href="#" class="user-icon"><img src="https://via.placeholder.com/150" alt="User"></a>
      <ul class="dropdown-menu">
        <li><a href="#" class="menu-option">Perfil</a></li>
        <li><a href="#" class="menu-option">Configuración</a></li>
        <li><a href="../login/login.html" class="menu-option">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>
  <div class="container">
    <h1>Reporte de Servicio Social</h1>
    <a class="download-btn" href="Reporte Servicio Social.doc">Descargar documento aquí</a>

    <form action="uploadreporte.php" method="POST" enctype="multipart/form-data">
      <label for="fileInput">Seleccionar archivo:</label>
      <input type="file" id="fileInput" name="fileInput">
      <button type="submit" name="submit">Subir</button>
    </form>
  </div>
</body>
</html>
