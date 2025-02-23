<?php
include 'db_connect.php';

$sql = "SELECT id, nombre, email, fecha_registro FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nombre: " . $row["nombre"]. " - Email: " . $row["email"]. " - Fecha de Registro: " . $row["fecha_registro"]. "<br>";
    }
} else {
    echo "0 resultados";
}
?>