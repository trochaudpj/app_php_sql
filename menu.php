<?php session_start();
require_once("db-function.php");
require_once("functions.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="CSS/style.css">
    <title></title>
</head>

<body>
    <div class="container">
        <header>
            <div class="container">
                <ul class="nav container-fluid">
                    <li class="nav-item">
                        <a class=" nav-link btn btn-outline-dark" aria-current="page" href="index.php">
                            <h3><img src="img/logo.svg" alt="" width="60" height="48" class="d-inline-block align-text-top">
                                APP PHP</h3>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fas fa-home  btn btn-outline-dark" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Accueil" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fas fa-user-lock btn btn-outline-dark" href="admin.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nouveau produit">New product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fas fa-shopping-cart btn btn-outline-dark position-relative" href="recap.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Panier"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= getFullQtt() ?></span>panier</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        
                        <li class="nav-item"><a href="security.php?action=logout" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mon compte" class="nav-link fas fa-user-cog btn btn-outline-dark"><?= $_SESSION['user']['username'] ?></a></li>
                        <li class="nav-item"><a href="security.php?action=logout" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Déconnexion" class="nav-link fas fa-user-alt-slash btn btn-outline-dark">Déconnexion</a></li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item"><a href="login.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Connexion" class="nav-link fas fa-user-lock btn btn-outline-dark">Connexion</a></li>
                        <li class="nav-item"> <a href="register.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Inscription" class="nav-link fas fa-user-edit btn btn-outline-dark">Inscription</a></li>

                    <?php
                    }
                    ?>
                </ul>
            </div>
            <?= getMessage() ?>
        </header>
    </div>