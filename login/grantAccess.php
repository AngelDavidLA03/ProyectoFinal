<?php

include('database.php');

$USER=$_POST['user'];
$PASSWORD=$_POST['pass'];

//$conexion=mysqli_connect("localhost","root","","sistema"); //Login es el nombre de la Base de datos



$consulta = "SELECT `tipoUser` FROM `usuario` WHERE `username` LIKE '$USER' AND `pass` LIKE '$PASSWORD';";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['rol'] == "Dependencia")
{   //Si es igual a 1 que me mande a la pagina del alumno
    header("location:Alumno.php");
}
else if($filas['rol'] == "Alumno")
{   //Si es igual a 2 que me mande a la pagina del profesor
    header("location:Profesor.php");
} 
else if($filas['rol'] == "Coordinador")
{   //Si es igual a 3 que me mande a la pagina del Admin
    header("location:Admin.php");
}
else
{
    header("location:login.html"); //Carga la pagina y vuelve a solicitar los datos
    //include("index.html");
    echo "ERROR DE AUTENTIFICACION";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>