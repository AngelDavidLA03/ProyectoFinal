<!-- 
ESTAS LÍNEAS DE CÓDIGO ESTABLECERÁN LA CONEXIÓN CON LA BASE DE DATOS 
-->

<?php
    

    $servidor = "localhost"; // servidor
    $usuario = "root";     
    $contraseña = "";
    $bd = "db_serviciosocial";  //nombre de la base de datos

    // Conectar a la base de datos
    $conexion = mysql_connect($servidor, $usuario, $contraseña, $bd);

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysql_connect_error());
    }
    
?>
