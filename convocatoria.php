<!DOCTYPE html>
<html>
<head>
	<title>Nueva Convocatoria</title>
	<link rel="stylesheet" type="text/css" href="estiloconvocatoria.css">
</head>
<body>
	<header>
		<h1>Convocatorias de Servicio Social</h1>
	</header>
	
	<nav>
		<ul>
			<li><a href="index.php">Alumnos en Servicio Social</a></li>
			<li><a href="nueva_convocatoria.php">Nueva Convocatoria</a></li>
			<li><a href="aceptar_vacantes.php">Aceptar Vacantes</a></li>
			<li><a href="solicitud_servicio_social.php">Solicitudes de Servicio Social</a></li>
		</ul>
	</nav>
	
	<section>
		<h2>Nueva Convocatoria</h2>
		
		<form action="agregar_convocatoria.php" method="post">
			<label for="empresa">Empresa:</label>
			<input type="text" id="empresa" name="empresa"><br>
			
			<label for="puesto">Puesto:</label>
			<input type="text" id="puesto" name="puesto"><br>
			
			<label for="descripcion">Descripción:</label><br>
			<textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br>
			
			<label for="fecha_inicio">Fecha de inicio:</label>
			<input type="date" id="fecha_inicio" name="fecha_inicio"><br>
			
			<label for="fecha_fin">Fecha de fin:</label>
			<input type="date" id="fecha_fin" name="fecha_fin"><br>
			
			<input type="submit" value="Agregar Convocatoria" class="btn">
		</form>
	</section>
</body>
</html>
