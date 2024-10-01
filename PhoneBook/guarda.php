<?php

session_start();

require 'config/database.php';

$name = $conn->real_escape_string($_POST['name']);
$lastName = $conn->real_escape_string($_POST['lastName']);
$countryNumber = $conn->real_escape_string($_POST['countryNumber']);
$lada = $conn->real_escape_string($_POST['lada']);
$phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
$email = $conn->real_escape_string($_POST['email']);
$profile = $conn->real_escape_string($_POST['profile']);


$sql = "INSERT INTO phonenumbers (countryNumber, lada, phoneNumber) VALUES ($countryNumber, $lada, $phoneNumber)
        INSERT INTO emails (email) VALUES ($email)";
if ($conn->query($sql)) {
    $id = $conn->insert_id;

    $sql = "SELECT IDP FROM phonenumbers WHERE phoneNumber = $phoneNumber";
    $IDP = $conn->query($sql)['IDP'];

    $sql = "SELECT IDE FROM emails WHERE email = $email";
    $IDE = $conn->query($sql)['IDE'];

    $sql = "INSERT INTO contact (name, lastName, IDP, IDE, profile) VALUES ($name, $lastName, $IDP, $IDE, $profile)"


    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro guardado";

    if ($_FILES['profile']['error'] == UPLOAD_ERR_OK) {
        $permitidos = array("image/jpg", "image/jpeg");
        if (in_array($_FILES['poster']['type'], $permitidos)) {

            $dir = "assets/images";

            $info_img = pathinfo($_FILES['profile']['name']);
            $info_img['extension'];

            $poster = $dir . '/' . $id . '.jpg';

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
    $_SESSION['msg'] = "Error al guarda imágen";
}

header('Location: index.php');
