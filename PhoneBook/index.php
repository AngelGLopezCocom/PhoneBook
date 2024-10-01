<?php

session_start();

require 'config/database.php';

$sqlAgenda = "SELECT * FROM contact INNER JOIN phonenumbers ON contact.IDP = phonenumbers.IDP
                INNER JOIN emails ON contact.IDE = emails.IDE";
$agenda = $conn->query($sqlAgenda);

$dir = "assets/images/";

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Book</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <div class="container py-3">

        <h2 class="text-center">Phone Book</h2>

        <hr>

        <?php if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
            <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            unset($_SESSION['color']);
            unset($_SESSION['msg']);
        } ?>

        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> New Contact </a>
            </div>
        </div>

        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Phone number</th>
                    <th>E-mail</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $agenda->fetch_assoc()) { 
                    $number = $row['countryNumber'] . $row['lada'] . $row['phoneNumber']; ?>
                    <tr>
                        <td><?= $row['IDC']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['lastName']; ?></td>
                        <td><?= $number; ?></td>
                        <td><?= $row['email']; ?></td>

                        <td><img src="<?= $dir . $row['profile'] ?>" width="100"></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row['IDC']; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>

                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $row['IDC']; ?>"><i class="fa-solid fa-trash"></i></i> Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <?php include 'editaModal.php'; ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>