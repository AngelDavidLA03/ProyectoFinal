<!DOCTYPE html>
<html>
<head>
	<title>Página de prueba</title>
</head>
<body>
    <?php
        session_start();

        // Se comprueba si el Alumno ha iniciado sesion
        if((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) && (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== "Alumno"))
        {
            header("location:../../login/login.html");
            session_destroy();
            exit;
        } 
    ?>
    <h1><?php echo "Bienvenido " . $_SESSION["user"]?></h1>
</body>
</html>
