<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/taxi.png">
    <title>Repuestaxisneiva</title>
    <script src="../librerias/sweetalert2.all.min.js"></script>
    <script src="../librerias/sweetalert2.min.css"></script>
    <link href="../view/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../view/assets/css/all.css" rel="stylesheet">
    <link href="../view/assets/css/style.css" rel="stylesheet">
    <link href="../view/assets/css/alertify.css" rel="stylesheet">
    <link href="../view/assets/css/datatables.css" rel="stylesheet">
    <script src="../view/assets/js/jquery-3.6.0.js"></script>
    <script src="../view/assets/js/bootstrap.js"></script>
    <script src="../view/assets/js/alertify.js"></script>
    <script src="../view/assets/js/all.js"></script>
    <script src="../view/assets/js/datatables.js"></script>
    <script src="../view/assets/js/axios.min.js"></script>
    <script src="../view/assets/js/login.validate.js"></script>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid bg-dark">
                <a class="navbar-brand text-warning" href="#">Repuestaxisneiva</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-warning" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="../view/clientes.frm.php">Clientes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Formularios
                            </a>
                            <ul class="dropdown-menu bg-dark">
                                <li><a class="dropdown-item text-warning" href="../view/usuarios.frm.php">Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a onclick="deleteLogin()" class="nav-link text-warning" href="#" tabindex="-1">
                                <i class="fa-solid fa-right-to-bracket fa-bounce"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit">Buscar</button>
                    </form> -->
                </div>
            </div>
        </nav>
    </div>
