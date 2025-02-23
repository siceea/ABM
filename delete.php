<?php
include_once 'db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conn->query($sql) === true) {
    echo "Registro eliminado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
