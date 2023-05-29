<?php
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;

      require 'PHPMailer/PHPMailer.php';
      require 'PHPMailer/SMTP.php';
      require 'PHPMailer/Exception.php';

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

      echo $exist ." ". $correo ." ".$code;
      if($exist != 0)
      {
        mysqli_free_result($result);
        mysqli_close($conexion);
        sendEmail($code,$correo);
      }
      else
      {
        echo "Ps no we";
      }
    
    function sendEmail($c,$e)
    {
        $url = 'https://proyectoservicio.online/login/confirmPassword.html';
        $para  = $e;
        $título = 'Cambio de contraseña en el sistema';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                            //Enable verbose debug output
            $mail->isSMTP();                                                  //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                         //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                         //Enable SMTP authentication
            $mail->Username   = 'administracion@proyectoservicio.online';     //SMTP username
            $mail->Password   = 'G3nU1n4M3nT3{]?_';                           //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                  //Enable implicit TLS encryption
            $mail->Port       = 465;                                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('administracion@proyectoservicio.online', 'Administracion de Servicio Social');
            $mail->addAddress($e);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Cambio de Contraseña';
            $mail->Body    = '<html><head>
            <meta charset="UTF8">
            <title>Intento de Cambio de Contraseña</title>
            </head>
            <body>
            <p>Hubo un intento de restablecimiento de tu clave de acceso en el sistema</p>
            <p>Si fuiste tu, accede a la siguiente URL:
            </p><p> <a href="'.$url.'?email='.$para.'&amp;cod='.$c.'">
                Verificar cuenta </a> 
                </p>
            <p>En caso de que no hayas sido tu, simplemente ignora este correo


            </p></body></html>';

                $mail->send();
                header("location: ../login/login.html?email=true");
                exit;
            } catch (Exception $e) {
                header("location: ../login/login.html?email=false");
                exit;
            }

    }
          
?>