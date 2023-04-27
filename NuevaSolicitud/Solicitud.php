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
	            <h2>Título de la convocatoria:</h2>

	            <form action="#" method="post">
	                <label for="titulo">Título:</label>
	                <input type="text" id="titulo" name="titulo" required>

	                <label for="descripcion">Descripción:</label>
	                <textarea id="descripcion" name="descripcion" rows="5" required></textarea>
	            </form>
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
                    