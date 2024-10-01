<?php

session_start();

require 'config/database.php';

$IDC = $conn->real_escape_string($_POST['IDC']);

$sql = "DELETE FROM contact WHERE IDC=$IDC";
if ($conn->query($sql)) {

    $dir = "assets/images";
    $profile = $dir . '/' . $id . '.jpg';

    if (file_exists($profile)) {
        unlink($profile);
    }

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro eliminado";
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al eliminar registro";
}

header('Location: index.php');
