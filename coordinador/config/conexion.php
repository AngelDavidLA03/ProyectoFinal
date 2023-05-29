<!-- 
ESTAS LÍNEAS DE CÓDIGO ESTABLECERÁN LA CONEXIÓN CON LA BASE DE DATOS 
-->

<?php
    

    $servidor = "localhost"; // servidor
    $usuario = "u611167522_root";     
    $contraseña = "G3nU1n4M3nT3{]?_";
    $bd = "u611167522_db_serviciosoc";  //nombre de la base de datos

    // Conectar a la base de datos
    $conexion = mysql_connect($servidor, $usuario, $contraseña, $bd);

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysql_connect_error());
    }
    
?>
