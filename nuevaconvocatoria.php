<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Publicación de nueva convocatoria para servicio social</title>
	<link rel="stylesheet" href="NuevaConvocatoria.css">
</head>
<body>
	<header>
		<h1>Publicación de nueva convocatoria para servicio social</h1>
		<nav>
			<ul>
				<li><a href="./index.html">Inicio</a></li>
				<li><a href="./Alumnosenservicio.php">Alumnos</a></li>
				<li><a href="./convocatoria.php">Convocatorias</a></li>
				<li><a href="#">Aceptar Vacantes</a></li>
				<li><a href="#">Baja Alumno</a></li>
			</ul>
		</nav>
	</header>
	<section>
		<h2>Nueva convocatoria</h2>
		<form action="#" method="post">
			<label for="titulo">Título:</label>
			<input type="text" id="titulo" name="titulo" required>
			<label for="descripcion">Descripción:</label>
			<textarea id="descripcion" name="descripcion" rows="5" required></textarea>
			<label for="requisitos">Requisitos:</label>
			<textarea id="requisitos" name="requisitos" rows="5" required></textarea>
			<label for="fecha_inicio">Fecha de inicio:</label>
			<input type="date" id="fecha_inicio" name="fecha_inicio" required>
			<label for="fecha_fin">Fecha de finalización:</label>
			<input type="date" id="fecha_fin" name="fecha_fin" required>
			<button type="submit">Publicar</button>
		</form>
	</section>
	
</body>
</html>
