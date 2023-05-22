<?php
// Verificar si se recibieron los datos del formulario
  session_start();
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtener los valores enviados
  $codigouser = $_POST["codigouser"];
  $nomdep = $_POST["nomdep"];
  $rfc = $_POST["rfc"];
  $canttrab = $_POST["canttrab"];
  $giro = $_POST["giro"];
  $tel = $_POST["tel"];
  $calle = $_POST["calle"];
  $numext = $_POST["numext"];
  $numint = $_POST["numint"];
  $colonia = $_POST["colonia"];
  $cp = $_POST["cp"];
  $ciudad = $_POST["ciudad"];
  $entfed = $_POST["entfed"];
  $tipo = $_POST["tipo"];
  $calif = 'REGULAR';

  $_SESSION['rfc'] = $rfc;

  // Obtener la información de la imagen
  $image = $_FILES["profile-image"] ?? null; // Usamos el operador de fusión null para evitar el error si el valor no está definido
  $image_tmp_name = isset($image["tmp_name"]) ? $image["tmp_name"] : null;

  // Verificar que se haya seleccionado una imagen
  if (!empty($image_tmp_name)) {
    // Leer el contenido del archivo
    $image_content = file_get_contents($image_tmp_name);

    // Conexión a la base de datos
    $mysqli = new mysqli('localhost', 'root', 'AdLa20031108', 'db_serviciosocial'); // Reemplaza con la configuración correcta de la base de datos

    // Verificar la conexión
    if ($mysqli->connect_errno) {
      echo "Error en la conexión a la base de datos: " . $mysqli->connect_error;
      exit();
    }

    // Consulta preparada para el INSERT
    $stmt = $mysqli->prepare("INSERT INTO `dependencia` (`codUserDepend`,`nomDepend`,`RFC`,`califDepend`,`numTrabajadores`,`enfoqueDepend`,`numTelfDepend`,`calleDepend`,`numExtDepend`,`numIntDepend`,`coloniaDepend`,`cpDepend`,`ciudadDepend`,`efDepend`,`logo`,`tipoDepend`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisssiisisssb", $codigouser, $nomdep, $rfc, $calif, $canttrab, $giro, $tel, $calle, $numext, $numint, $colonia, $cp, $ciudad, $entfed, $image_content, $tipo);

    // Ejecutar la consulta
    if ($stmt->execute()) {
      // Éxito: la consulta se ejecutó correctamente
      echo "Datos guardados exitosamente";
    } else {
      // Error: la consulta no se pudo ejecutar
      echo "Error al guardar los datos: " . $stmt->error;
    }

    // Cerrar la conexión y liberar recursos
    $stmt->close();
    $mysqli->close();
  } else {
    // Si no se recibió el archivo, mostrar un mensaje de error
    echo "Error: No se seleccionó ningún archivo";
  }}

?>