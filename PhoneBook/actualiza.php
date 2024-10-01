<?php

session_start();

require 'config/database.php';

$IDC = $conn->real_escape_string($_POST['IDC']);
$name = $conn->real_escape_string($_POST['name']);
$lastName = $conn->real_escape_string($_POST['lastName']);
$countryNumber = $conn->real_escape_string($_POST['countryNumber']);
$lada = $conn->real_escape_string($_POST['lada']);
$phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
$email = $conn->real_escape_string($_POST['email']);
$profile = $conn->real_escape_string($_POST['profile']);

$sql = "SELECT IDP FROM contact WHERE IDC = $IDC";
$IDP = $conn->query($sql)['IDP'];

$sql = "SELECT IDE FROM contact WHERE IDC = $IDC";
$IDE = $conn->query($sql)['IDE'];


$sql = "UPDATE phonenumbers SET countryNumber ='$countryNumber', lada = '$lada', phoneNumber=$phoneNumber WHERE IDP=$IDP
        UPDATE emails SET email = '$email' WHERE IDE = $IDE
        UPDATE contact SET name = '$name' lastName = '$lastName' WHERE IDC = $IDC";
if ($conn->query($sql)) {

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro actualizado";

    if ($_FILES['profile']['error'] == UPLOAD_ERR_OK) {
        $permitidos = array("image/jpg", "image/jpeg");
        if (in_array($_FILES['profile']['type'], $permitidos)) {

            $dir = "assets/images";

            $info_img = pathinfo($_FILES['poster']['name']);
            $info_img['extension'];

            $poster = $dir . '/' . $IDC . '.jpg';

            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }

            if (!move_uploaded_file($_FILES['profile']['tmp_name'], $poster)) {
                $_SESSION['color'] = "danger";
                $_SESSION['msg'] .= "<br>Error al guardar imagen";
            }
        } else {
            $_SESSION['color'] = "danger";
            $_SESSION['msg'] .= "<br>Formato de imágen no permitido";
        }
    }
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al actualizar registro";
}


header('Location: index.php');
