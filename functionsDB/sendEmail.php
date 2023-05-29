<?php
      require_once('database.php');

      $conexion = conexion();

      // Se obtienen los argumentos de la ventana anterior
      $EMAIL = (string)$_POST['email'];

      $stmt = $conexion->prepare("CALL  searchAccess(?)");
      $stmt->bind_param("s",$EMAIL);

      // Se ejecuta el procedure, y se obtiene el resultado almacenado en un array
      $stmt->execute();
      $result = $stmt->get_result();

      $getConsulta = array();

      // Se introducen todos los valores dentro del array vacio
      while ($fila = mysqli_fetch_array($result, MYSQLI_NUM)) 
      {
          $getConsulta = $fila;
      }

      $exist = $getConsulta[0];
      $code = $getConsulta[1];
      $correo = $getConsulta[2];

      echo $correo;
      if($exist == 1)
      {
        mysqli_free_result($result);
        mysqli_close($conexion);
        sendEmail($code,$correo);
      }
      else
      {
        header("location: ../login/login.html?email=true");
      }
    
    function sendEmail($c,$e)
    {
        $url = 'https://proyectoservicio.online/login/confirmPassword.html';
        $para  = $e;
        $título = 'Cambio de contraseña en el sistema';

        // mensaje
        $mensaje = '
        <html>
        <head>
            <meta charset="UTF8" />
        <title>Recordatorio de cumpleaños para Agosto</title>
        </head>
        <body>
        <p>Hubo un intento de restablecimiento de tu clave de acceso en el sistema</p>
        <p>Si fuiste tu, accede a la siguiente URL:
        <p> <a 
            href="'.$url.'?email='.$para.'&cod='.$c.'">
            Verificar cuenta </a> 
            </p>
        <p>En caso de que no hayas sido tu, simplemente ignora este correo</>
        
        </body>
        </html>
        ';

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: Servicio Social <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 


        $enviado=false;
        if(mail($para, $título, $mensaje, $headers)){
        $enviado=true;
        }
      header("location: ../login/login.html?email=true");
      exit;
    }
    
?>