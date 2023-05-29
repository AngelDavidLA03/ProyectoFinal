<?php
$host = "localhost";
$db_name = "u611167522_db_serviciosoc";
$username = "u611167522_root";
$password = "G3nU1n4M3nT3{]?_";

try {
    $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Error de conexión: " . $exception->getMessage();
}
?>
