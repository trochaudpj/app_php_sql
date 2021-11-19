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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="CSS/style.css">
    <title></title>
</head>

<body>
    <div class="container">
        <header>
            <ul class="nav container-fluid"> 
                 <li class="nav-item">
                    <a class=" nav-link btn btn-outline-dark" aria-current="page" href="index.php">  <h3><img src="img/logo.svg" alt="" width="60" height="48" class="d-inline-block align-text-top">
                       APP PHP</h3></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fas fa-home  btn btn-outline-dark" aria-current="page" href="index.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fas fa-user-lock btn btn-outline-dark" href="admin.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fas fa-shopping-cart btn btn-outline-dark position-relative" href="recap.php"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= getFullQtt() ?></span></a>
                </li>
                
            </ul>
            <?= getMessage() ?>




        </header>
    </div>