<?php

require_once('database.php');
session_start();


$conexion = conexion();

// Se obtienen los argumentos de la ventana anterior
$USER = (string)$_POST['user'];
$PASSWORD = (string)$_POST['pass'];

$stmt = $conexion->prepare("CALL  loginAccess(?,?)");
$stmt->bind_param("ss",$USER,$PASSWORD);

// Se ejecuta el procedure, y se obtiene el resultado almacenado en un array
$stmt->execute();
$result = $stmt->get_result();

$getConsulta = array();

// Se introducen todos los valores dentro del array vacio
while ($fila = mysqli_fetch_array($result, MYSQLI_NUM)) 
{
    $getConsulta = $fila;
}

$exsite = $getConsulta[0];
$usuario = $getConsulta[1];
$codigo = $getConsulta[2];

// Se analizan los valores obtenidos para poder reedireccionar a la pagina correspondiente
if($exsite == 1)
{
    $_SESSION['isLogged'] = true;
    $_SESSION['tipo'] = $usuario;
    $_SESSION['user'] = $codigo;

    // Se obtiene el directorio de la raiz
    

    if($usuario == "DEPENDENCIA")
    {   
        header("location: ../Dependencia/cuenta/iniciodependencia.php");
    }
    else if($usuario == "ALUMNO")
    {   
        header("location: ../Alumnos/InicioAlumno/estudiante.php");
    } 
    else if($usuario == "COORDINADOR")
    {
        header("location: ../coordinador/iniciocoordinador.php");
    }
}
else
{
    header("location: ../login/login.html?failed=true"); //Carga la pagina y vuelve a solicitar los datos
}

mysqli_free_result($result);
mysqli_close($conexion);
exit;
?>