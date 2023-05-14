
<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "db_serviciosocial");

// Obtener los parámetros de la petición AJAX
$codUser = $_POST["codUser"];
$codigoConv = $_POST["codigoConv"];

// Ejecutar el procedimiento almacenado
$resultado = mysqli_query($conexion, "CALL rejectDepend('$codUser')");

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Enviar una respuesta al cliente
echo "El registro se ha rechazado correctamente.";
?>