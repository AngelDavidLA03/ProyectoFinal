<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nueva convocatoria - Servicio Social</title>
    <link rel="stylesheet" type="text/css" href="stylesolicitud.css">

    <style>
      /* Aplica text-transform: uppercase al campo de entrada de texto */
      input[type="text"] {
        text-transform: uppercase;
      }</style>
</head>
<body>
	<header>
		<div class="container">
			<nav>
				<ul>
                    <li><a href="../cuenta/services.html">Cuenta</a></li>
                    <li><a href="../alumnos/alumno.html">Alumnos en Servicio</a></li>
                    <li><a href="../NuevaSolicitud/Solicitud.php">Solicitud</a></li>
                    <li><a href="../Convocatoria/Convocatoria.php">Convocatorias</a></li>
                    <li><a href="../login/login.html">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
	    <section>
             
        <div class="card">
  <div class="card-header">
    <h2>Nueva Solicitud</h2>
  </div>
  <div class="card-body">
    <form>
      <div class="form-group">
        <label for="nombre-dependencia">Cargo:</label>
        <input type="text" id="nombre-dependencia" name="nombre-dependencia" style="text-transform: uppercase;" required>
      </div>
      <div class="form-group">
        <label for="nombre-representante">Nombre Representante:</label>
        <input type="text" id="nombre-representante" name="nombre-representante" style="text-transform: uppercase;" required>
      </div>
      <div class="form-group">
        <label for="rfc-dependencia">RFC Dependencia:</label>
        <input type="text" id="rfc-dependencia" name="rfc-dependencia" style="text-transform: uppercase;" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" style="text-transform: uppercase;" required>
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" style="text-transform: uppercase;" required>
      </div>
      
    </form>
  </div>
  <div class="card-footer">
    <div class="button-container">
      <!-- aquí puedes agregar tus botones -->
    </div>
  </div>
</div>


	        <div class="card">
	            <h2>Fecha y contacto:</h2>

	            <form action="#" method="post">
	                <label for="fecha">Fecha de inicio:</label>
	                <input type="date" id="fecha" name="fecha" required>

                    
                    
                        <form action="#" method="post">
                            <label for="fecha">Fecha de inicio:</label>
                            <input type="date" id="fecha" name="fecha" required>
                    
                            <label for="duracion">Duración en semanas:</label>
                            <input type="number" id="duracion" name="duracion" required>
                    
                            <label for="contacto">Correo electrónico de contacto:</label>
                            <input type="email" id="contacto" name="contacto" required>
                    
                            <button type="submit">Publicar convocatoria</button>
                        </form>
                    </div>
                    