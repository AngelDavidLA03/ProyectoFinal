<?php 


$idServicio = $post["idServicio"];
$nomServic = $post["nomServic"];
$actividades = $post["actividades"];
$horaInicio = $post["horaInicio"];
$diasPorSem = $post["diasPorSem"];
$horaFin = $post["horaFin"];
$fechaInicio = $post["fechaInicio"];
$fechaFin = $post["fechaFin"];


    echo 'Hora de Inicio: ' . $horaInicio . '<br>';
    echo 'Días por Semana: ' . $diasPorSem . '<br>';
    echo 'Hora de Fin: ' . $horaFin . '<br>';
    echo 'Fecha de Inicio: ' . $fechaInicio . '<br>';
    echo 'Fecha de Fin: ' . $fechaFin . '<br>';
    echo '</div>';

?>