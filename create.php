<?php
include_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre'], $_POST['email'])) {
        $nombre = htmlspecialchars(trim($_POST['nombre']), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Error: Correo electrónico no válido");
        }
        $sql = "INSERT INTO usuarios (nombre, email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $email);
        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro.";
        }
        $stmt->close();
    } else {
        echo "Datos no válidos";
    }
}
?>

<form method="POST" action="create.php">
    Nombre: <input type="text" name="nombre" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" value="Crear">
</form>
