<!DOCTYPE html>
<html>
<head>
  <title>Documentos</title>
  <link rel="stylesheet" href="styledocumentos.css">

  <body>
  <div class="header">

    <h2 class="centered-heading">PORTAL</h2>
    <div class="user-menu">
      <a href="#" class="user-icon"><img src="https://via.placeholder.com/150" alt="User"></a>
      <ul class="dropdown-menu">
        <li><a href="#" class="menu-option">Perfil</a></li>
        <li><a href="#" class="menu-option">Configuración</a></li>
        <li><a href="..//login/login.html" class="menu-option">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>
</head>
<body>
  <header>
  </header>

  <div class="container">
  
    <div class="team-block">
      <form action="guardar.php" method="post" enctype="multipart/form-data" class="upload-form">
        <h3>Subir Carta de Presentación</h3>
        <input type="file" name="cartaToUpload" id="cartaToUpload">
        <input type="submit" value="Enviar" name="submitCarta">
      </form>
    </div>
    
    <div class="team-block">
      <form action="upload_constancia.php" method="post" enctype="multipart/form-data" class="upload-form">
        <h3>Subir Constancia de Estudios</h3>
        <input type="file" name="constanciaToUpload" id="constanciaToUpload">
        <input type="submit" value="Enviar" name="submitConstancia">
      </form>
    </div>
    
    <div class="team-block">
      <form action="upload_segunda_carta.php" method="post" enctype="multipart/form-data" class="upload-form">
        <h3>Subir Segunda Carta de Presentación</h3>
        <input type="file" name="segundaCartaToUpload" id="segundaCartaToUpload">
        <input type="submit" value="Enviar" name="submitSegundaCarta">
</form>
</div>

  </div>
</body>
</html>
