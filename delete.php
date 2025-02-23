<?php
include_once 'db_connect.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Registro eliminado exitosamente";
    } else {
        $mensaje= Error en la creacion desde la base de datos
        echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');
        //echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID no válido";
}
