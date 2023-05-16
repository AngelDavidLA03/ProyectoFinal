<?php 




// ...

// Obtener los valores de las variables de sesión
$idServicio = $_SESSION['idServicio'];
$nomServic = $_SESSION['nomServic'];
$actividades = $_SESSION['actividades'];
$horaInicio = $_SESSION['horaInicio'];
$diasPorSem = $_SESSION['diasPorSem'];
$horaFin = $_SESSION['horaFin'];
$fechaInicio = $_SESSION['fechaInicio'];
$fechaFin = $_SESSION['fechaFin'];

echo "Nombre de Servicio: " . $nomServic . "<br>";
echo "Actividades: " . $actividades . "<br>";
echo "Hora de Inicio: " . $horaInicio . "<br>";
echo "Días por Semana: " . $diasPorSem . "<br>";
echo "Hora de Fin: " . $horaFin . "<br>";
echo "Fecha de Inicio: " . $fechaInicio . "<br>";
echo "Fecha de Fin: " . $fechaFin . "<br>";
/**/
?>