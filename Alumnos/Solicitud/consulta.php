<?php
$host = "localhost";
$db_name = "db_serviciosocial";
$username = "root";
$password = "AdLa20031108";

try {
    $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Error de conexión: " . $exception->getMessage();
}
?>
