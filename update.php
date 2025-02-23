<?php
include_once 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['nombre'], $_POST['email']) && is_numeric($_POST['id'])) {
        $id = intval($_POST['id']);
        $nombre = htmlspecialchars(trim($_POST['nombre']), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Error: Correo electrónico no válido");
        }
        $sql = "UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $email, $id);
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

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if (!$row) {
        die("Usuario no encontrado");
    }
    $stmt->close();
} else {
    die("ID no válido");
}
?>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
    <input type="submit" value="Actualizar">
</form>
