<?php
include_once 'db_connect.php';
$sql = "SELECT id, nombre, email, fecha_registro FROM usuarios";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') .
                 " - Nombre: " . htmlspecialchars($row["nombre"], ENT_QUOTES, 'UTF-8') .
                 " - Email: " . htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') .
                 " - Fecha de Registro: " . htmlspecialchars($row["fecha_registro"], ENT_QUOTES, 'UTF-8') . "<br>";
        }
    } else {
        echo "0 resultados";
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta.";
}
$conn->close();
