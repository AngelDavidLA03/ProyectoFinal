<?php
      require_once('database.php');

      $conexion = conexion();

      // Se obtienen los argumentos de la ventana anterior
      $email = $_GET['e'];
      $cod = $_GET['c'];
      $pass = $_GET['p'];

      $stmt = $conexion->prepare("CALL changeAccess(?,?,?)");
      $stmt->bind_param("sss",$cod,$email,$pass);

      // Se ejecuta el procedure, y se obtiene el resultado almacenado en un array
      $stmt->execute();

      header("location: ../login/login.html?passChange=true");
      mysqli_free_result($result);
      mysqli_close($conexion);
      exit;
?>