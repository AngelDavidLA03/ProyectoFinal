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
        <li><a href="..//login/login.html" class="menu-option">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>
  <div class="container">
    <h1>Reporte de Servicio Social</h1>
    <a class="download-btn" href="Reporte Servicio Social.doc" download>Descargar documento aquí</a>
    <div class="team-block">
  <label for="fileInput">Seleccionar archivo:</label>
  <label class="custom-file-input" for="fileInput">Explorar archivos</label>
  <input type="file" id="fileInput">
  <span class="file-name"></span>
  <button onclick="uploadFile()">Subir</button>
</div>
</div>
  <script>
    var fileInput = document.getElementById('fileInput');
    var fileNameContainer = document.querySelector('.file-name');

    fileInput.addEventListener('change', function() {
      fileNameContainer.textContent = this.files[0].name;
    });

    function uploadFile() {
      var file = fileInput.files[0];

      var formData = new FormData();
      formData.append('file', file);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'subirreporte.php', true);

      xhr.onload = function() {
        if (xhr.status === 200) {
          console.log('Archivo subido exitosamente');
        } else {
          console.error('Error al subir el archivo:', xhr.status);
        }
      };

      xhr.onerror = function() {
        console.error('Error de conexión al subir el archivo');
      };

      xhr.send(formData);
    }
  </script>
</body>
</html>