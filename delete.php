<?php
include 'db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>