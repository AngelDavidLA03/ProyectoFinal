<?php
// Obtener el ID del alumno desde la variable POST
$id = $_POST['id'];

// Conectar a la base de datos
$conn = mysqli_connect("localhost","u611167522_root","G3nU1n4M3nT3{]?_","u611167522_db_serviciosoc");

// Verificar si hubo un error al conectar
if (mysqli_connect_errno()) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del alumno desde la base de datos
$resultado = mysqli_query($conn, "SELECT codUserDepend,idDepend,nomDepend,RFC,enfoqueDepend,califDepend,calleDepend,numExtDepend,numIntDepend,coloniaDepend,cpDepend,ciudadDepend,numTelfDepend,tipoDepend,
(SELECT d.document FROM convenio AS cvn INNER JOIN documento AS d ON d.idDocument = cvn.idDocumentConv
                          INNER JOIN dependencia AS dep ON dep.codUserDepend = cvn.codUserDepend 
 WHERE dep.codUserDepend = '$id') AS conven,
(SELECT d.document FROM directorgeneral AS dg INNER JOIN administrar AS a ON dg.idDirector = a.idDirector
                              INNER JOIN dependencia AS dep ON a.codUserDepend = dep.codUserDepend
                             INNER JOIN decretos ON decretos.idDirectorDec = dg.idDirector
                             INNER JOIN documento AS d ON d.idDocument = decretos.idDocumentDec
 WHERE dep.codUserDepend = '$id') AS decret,
(SELECT d.document FROM directorgeneral AS dg INNER JOIN administrar AS a ON dg.idDirector = a.idDirector
                              INNER JOIN dependencia AS dep ON a.codUserDepend = dep.codUserDepend
                             INNER JOIN nombramientorepresentante AS nre ON nre.idDirectorNomRep = dg.idDirector
                             INNER JOIN documento AS d ON d.idDocument = nre.idDocumentNomRep 
 WHERE dep.codUserDepend = '$id') AS nombr,
(SELECT d.document FROM directorgeneral AS dg INNER JOIN administrar AS a ON dg.idDirector = a.idDirector
                              INNER JOIN dependencia AS dep ON a.codUserDepend = dep.codUserDepend
                             INNER JOIN comprobantedomicilio AS dom ON dom.idDirectorDomic = dg.idDirector
                             INNER JOIN documento AS d ON d.idDocument = dom.idDocumentDomic 
 WHERE dep.codUserDepend = '$id') AS dom,
(SELECT d.document FROM directorgeneral AS dg INNER JOIN administrar AS a ON dg.idDirector = a.idDirector
                              INNER JOIN dependencia AS dep ON a.codUserDepend = dep.codUserDepend
                             INNER JOIN identificacionrepresentante AS ine ON ine.idDirectorCURP = dg.idDirector
                             INNER JOIN documento AS d ON d.idDocument = ine.idDocumentINE 
 WHERE dep.codUserDepend = '$id') AS identf,
(SELECT d.document FROM directorgeneral AS dg INNER JOIN administrar AS a ON dg.idDirector = a.idDirector
                              INNER JOIN dependencia AS dep ON a.codUserDepend = dep.codUserDepend
                             INNER JOIN regfedcont AS rfc ON rfc.idDirectorRFC = dg.idDirector
                             INNER JOIN documento AS d ON d.idDocument = rfc.idDocumentRFC
 WHERE dep.codUserDepend = '$id') AS regfed
FROM dependencia
WHERE codUserDepend = '$id'");
$fila = mysqli_fetch_assoc($resultado);

// Generar la tabla HTML con los detalles del alumno
echo '<table>';
echo '<tr><td>Código Dependencia:</td><td>' . $fila["codUserDepend"] . '</td></tr>';
echo '<tr><td>Id Dependencia:</td><td>' . $fila["idDepend"] . '</td></tr>';
echo '<tr><td>Nombre:</td><td>' . strtoupper($fila["nomDepend"]) . '</td></tr>';
echo '<tr><td>RFC:</td><td>' . $fila["RFC"] . '</td></tr>';
echo '<tr><td>Calificación:</td><td>' . $fila["califDepend"] . '</td></tr>';
echo '<tr><td>Giro:</td><td>' . $fila["enfoqueDepend"] . '</td></tr>';
echo '<tr><td>Teléfono:</td><td>' . $fila["numTelfDepend"] . '</td></tr>';
echo '<tr><td>Domicilio:</td><td>' . strtoupper($fila["calleDepend"] .' #'. $fila["numExtDepend"] .', #'. $fila["numIntDepend"] .' Col. '. $fila["coloniaDepend"] .', CP:' . $fila["cpDepend"] .', '. $fila["ciudadDepend"]).  '</td></tr>';
echo '<tr><td>Tipo:</td><td>' . $fila["tipoDepend"] . '</td></tr>';
echo '</table>';

$blobCvn = base64_encode($fila["conven"]);
$blobDec = base64_encode($fila["decret"]);
$blobNre = base64_encode($fila["nombr"]);
$blobDom = base64_encode($fila["dom"]);
$blobIne = base64_encode($fila["identf"]);
$blobRfc = base64_encode($fila["regfed"]);


if($fila["idDepend"] !== null && $blobCvn !== true)
{
  echo "<form id='form-cpe' action='documento.php' method='post' target='_blank'>";
  echo "<input type='hidden' name='blob' value='" . htmlspecialchars($blobCvn) . "'>";
  echo "<button type='submit'>Ver Convenio</button>";
  echo "</form>";
}
else if($fila["idDepend"] === null && $blobDec !== false && $blobNre !== false && $blobDom !== false && $blobIne !== false && $blobRfc !== false)
{
  echo "<form id='form-cpe' action='documento.php' method='post' target='_blank'>";
  echo "<input type='hidden' name='blob' value='" . htmlspecialchars($blobDec) . "'>";
  echo "<button type='submit'>Ver Decretos</button>";
  echo "</form>";

  echo "<form id='form-cpe' action='documento.php' method='post' target='_blank'>";
  echo "<input type='hidden' name='blob' value='" . htmlspecialchars($blobNre) . "'>";
  echo "<button type='submit'>Ver Nombramiento de Representante</button>";
  echo "</form>";

  echo "<form id='form-cpe' action='documento.php' method='post' target='_blank'>";
  echo "<input type='hidden' name='blob' value='" . htmlspecialchars($blobDom) . "'>";
  echo "<button type='submit'>Ver Comprobante de Domicilio</button>";
  echo "</form>";

  echo "<form id='form-cpe' action='documento.php' method='post' target='_blank'>";
  echo "<input type='hidden' name='blob' value='" . htmlspecialchars($blobIne) . "'>";
  echo "<button type='submit'>Ver Identificacion de Representante</button>";
  echo "</form>";

  echo "<form id='form-cpe' action='documento.php' method='post' target='_blank'>";
  echo "<input type='hidden' name='blob' value='" . htmlspecialchars($blobRfc) . "'>";
  echo "<button type='submit'>Ver Registro Federal del Contribuyente</button>";
  echo "</form>";
}




// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>