<?php
$servername = "localhost";
$username = "root";
$password = getenv('DB_PASSWORD'); // Obtiene la contraseña desde la variable de entorno;
$dbname = "sistema_altas_bajas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
