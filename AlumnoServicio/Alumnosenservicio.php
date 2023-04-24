<!DOCTYPE html>
<html>
<head>
	<title>Alumnos en Servicio Social</title>
	<link rel="stylesheet" type="text/css" href="stylealumno.css">


<style> 

		.container {
		max-width: 1200px;
		margin: 0 auto;
		padding: 0 20px;
		}

		.row {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		margin: 0 -10px;
		}

		.col {
		width: calc(33.33% - 20px);
		margin: 0 10px;
		padding: 20px;
		border-radius: 10px;
		background-color: #f7f7f7;
		}

		.card {
		border-radius: 10px;
		background-color: #fff;
		padding: 20px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.card h3 {
		margin-top: 0;
		}

		.card p {
		margin: 0;
		line-height: 1.5;
		}

		.card a {
		color: #007bff;
		text-decoration: none;
		}

		.card a:hover {
		text-decoration: underline;
		}


	/* Cartas de alumnos */	
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }

      .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #cccccc;
        padding: 20px;
        margin-bottom: 20px;
		border: 10px solid #99CC33;
        
      }
      .card h3 {
        color: #fff;
        background-color: #003366;
        padding: 10px;
        margin-top: 0;
        margin-bottom: 20px;
        border-radius: 5px 5px 0px 0px;
      }
      .card label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
      }
      .card input {
        display: block;
        margin-bottom: 20px;
        width: 95%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        font-size: 20px;
        background-color: #333333;
        color: #fff;
      }
      .card button {
        background-color: #99cc33;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-right: 10px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
      }
      .card button:hover {
        background-color: #006633;
      }




	/* POPUP*/
			.modal-bg {
			position: fixed;
			z-index: 999;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.modal {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
		}

		.modal h2 {
			margin-top: 0;
		}

		.search {
			margin-bottom: 10px;
		}

		.reason {
			margin-bottom: 10px;
		}

		.reason ul {
			list-style: none;
			margin: 1px;
			padding: 0;
		}

		.reason li {
		margin-bottom: 5px;
		}

		.reason label {
		display: inline-block;
		margin-left: 5px;
		}

		.comment textarea {
		width: 100%;
		height: 100px;
		padding: 5px;
		margin-top: 5px;
		border: 1px solid #ccc;
		border-radius: 3px;
		resize: none;
		}

		.buttons {
		text-align: center;
		}

		.buttons button {
		margin: 5px;
		padding: 5px 10px;
		border: none;
		border-radius: 3px;
		background-color: #0077cc;
		color: #fff;
		cursor: pointer;
		}

		.buttons button:hover {
		background-color: #005da8;
		}

		.cancelar {
		background-color: #ccc;
		color: #000;
		}

		.cancelar:hover {
		background-color: #999;
		}
	/* Termina POPUP*/

	/*Mostrar 3 cards por fila */
		
	/* Termina mostrar 3 cards */ 



</style>
</head>

<!-- Menú superior -->
<header>
	<div class="container">
		
		<nav class="main-menu">
			<ul>
				<li><a href="../accounts.html">Cuenta</a></li>
				<li><a href="./Alumnosenservicio.php">Alumnos en Servicio</a></li>
				<li><a href="../ConvocatoriasNuevas/NuevaConvocatoria.php">Nueva Convocatoria</a></li>
				<li><a href="../Convocatoria//Convocatoria.html">Convocatorias</a></li>
        <li><a href="./accounts.html">Cerrar Sesión</a></li>

			</ul>
		</nav>
	</div>
</header>

<!-- Contenedores -->
<body>
<section id="main">
      <div class="container">
        <h2>Alumnos en Servicio</h2>
        <div class="row">
          <div class="col">
            <div class="card">
              <h3>Pablo Rocha</h3>
              <label>Especialidad:</label>
              <input type="text" value="Lic Contabilidad">
              <label>Departamento:</label>
              <input type="text" value="Contabilidad">
              <label>Jefe/Responsable:</label>
              <input type="text" value="Juan Pérez">
              <label>Horas Completadas:</label>
              <input type="text" value="180">
              <label>Apoyo/Beca:</label>
              <input type="text" value="Si">
              <button onclick="window.open('../PdfServicio/1nuevopresentacion_ss.pdf')">Carta Presentación</button>
              <button id="popup-trigger">Solicitar Cambio</button>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <h3>Ángel López</h3>
              <label>Especialidad:</label>
              <input type="text" value="Lic Administración">
              <label>Departamento:</label>
              <input type="text" value="Recursos Humanos">
              <label>Jefe/Responsable:</label>
              <input type="text" value="Karla Loera">
              <label>Horas Completadas:</label>
              <input type="text" value="360">
              <label>Apoyo/Beca:</label>
              <input type="text" value="No">
			  <button onclick="window.open('../PdfServicio/1nuevopresentacion_ss.pdf')">Carta Presentación</button>
              <button id="popup-trigger">Solicitar Cambio</button>
            </div>
          </div>
		  <div class="col">
            <div class="card">
              <h3>Jesús Estrada</h3>
              <label>Especialidad:</label>
              <input type="text" value="Ing Industrial">
              <label>Departamento:</label>
              <input type="text" value="Calidad">
              <label>Jefe/Responsable:</label>
              <input type="text" value="Ana Herrera">
              <label>Horas Completadas:</label>
              <input type="text" value="300">
              <label>Apoyo/Beca:</label>
              <input type="text" value="No">
			  <button onclick="window.open('../PdfServicio/1nuevopresentacion_ss.pdf')">Carta Presentación</button>
              <button id="popup-trigger">Solicitar Cambio</button>
            </div>
          </div>

	</section>


<!-- POPUP -->
<div id="popup-container" class="modal-bg" style="display:none">
  <div class="modal">
    <h2> Solicitar cambio alumno</h2>
  
    <div class="reason">
      <h3>Seleccione la razón por la que dará de baja al alumno:</h3>
      <ul>
        <li><label><input type="checkbox" name="reason" value="inasistencia"> Baja por inasistencia</label></li>
        <li><label><input type="checkbox" name="reason" value="dependencia"> El alumno encontró otra dependencia</label></li>
        <li><label><input type="checkbox" name="reason" value="horarios"> El alumno no puede cumplir con los horarios</label></li>
        <li><label><input type="checkbox" name="reason" value="decision"> Por decisión de la dependencia</label></li>
        <li><label><input type="checkbox" name="reason" value="actividades"> El alumno no puede cumplir con las actividades</label></li>
      </ul>
    </div>
    <div class="comment">
      <h3>Escribe un breve motivo por el cual estás dando de baja al alumno:</h3>
      <textarea></textarea>
    </div>
    <div class="buttons">
      <button class="enviar">Enviar</button>
      <button class="cancelar">Cancelar</button>
    </div>
  </div>
</div>
<!-- POPUP -->

<script>
  // Get the popup container and trigger elements
  const popupContainer = document.getElementById('popup-container');
  const popupTrigger = document.getElementById('popup-trigger');

  // Add an event listener to the trigger element to show the popup
  popupTrigger.addEventListener('click', () => {
    popupContainer.style.display = 'block';
  });

  // Add an event listener to the cancel button to hide the popup
  const cancelButton = popupContainer.querySelector('.cancelar');
  cancelButton.addEventListener('click', () => {
    popupContainer.style.display = 'none';
  });
</script>


	<footer>
		<div class="container">
			<p>Derechos Reservados &copy; 2023</p>
		</div>
	</footer>
</body>
</html>

