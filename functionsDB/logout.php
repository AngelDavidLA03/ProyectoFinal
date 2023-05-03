<?php
        session_start();

        // Se comprueba si el Coordinador ha iniciado sesion
        header("location: ../login/login.html");
        session_destroy();
        exit;
    ?>