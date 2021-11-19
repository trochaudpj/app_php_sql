<?php
session_start();
include "functions.php";
require_once("db-function.php");
$action = filter_input(INPUT_GET, "action", FILTER_VALIDATE_REGEXP, [
    "options" => [
        "regexp" => "/addProd|ajoutBdd|modifBdd|updateQtt|deleteProd|deleteAll/"
    ]
]);

if ($action) {
    switch ($action) {
        case "ajoutBdd":

            if (isset($_POST['submit'])) {

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $img = filter_input(INPUT_POST, "img", FILTER_SANITIZE_URL);
                $categorie = filter_input(INPUT_POST, "categorie", FILTER_VALIDATE_INT);

                $redirect = insertProduct($name, $description, $price, $img,$categorie);

                setMessage("success", "Produit ajouté avec succès !");
                redirect("product.php?id=" . $redirect);
            } else {
                setMessage("error", "Produit pas ajouté!");
                redirect("index.php");
            }
            break;
        case "modifBdd":
            if (isset($_POST['submit'])) {
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $img = filter_input(INPUT_POST, "img", FILTER_SANITIZE_URL);
                $categorie = filter_input(INPUT_POST, "categorie", FILTER_VALIDATE_INT);

                $id = $_GET['id'];
                $redirect = modifProduct($name, $description, $price, $img,$categorie, $id);
                
                setMessage("success", "Produit modifié avec succès !");
                redirect("product.php?id=" . $id);
            } else {
                setMessage("error", "Produit pas modifié!");
                redirect("index.php");
            }
            break;
        case "addProd":
            $id = $_GET['id'];
            if (!isset($_SESSION['products'])) {
                $_SESSION['products'] = [];
            }
            if (!isset($_POST['Qadd'])) {
                $Qadd = 1;
            } else {
                $Qadd = $_POST['Qadd'];
            }
            $already = null;
            foreach ($_SESSION['products'] as $index => $product) {
                if ($product['id'] == $id) {
                    $already = $index;
                }
            }
            if ($already === null) {
                $product = findOneById($_GET['id']);
                $product['qtt'] = $Qadd;
                $_SESSION['products'][] = $product;
                setMessage("success", "Produit $name ajouté avec succès ! <a href='recap.php'>Voir le panier</a>");
            } else {
                $_SESSION['products'][$already]['qtt'] += $Qadd;
            }
            redirect("index.php");
            break;
        case "addProd":
            $id = $_GET['id'];
            if (!isset($_SESSION['products'])) {
                $_SESSION['products'] = [];
            }
            if (!isset($_POST['Qadd'])) {
                $Qadd = 1;
            } else {
                $Qadd = $_POST['Qadd'];
            }
            $already = null;
            foreach ($_SESSION['products'] as $index => $product) {
                if ($product['id'] == $id) {
                    $already = $index;
                }
            }
            if ($already === null) {
                $product = findOneById($_GET['id']);
                $product['qtt'] = $Qadd;
                $_SESSION['products'][] = $product;
                setMessage("success", "Produit $name ajouté avec succès ! <a href='recap.php'>Voir le panier</a>");
            } else {
                $_SESSION['products'][$already]['qtt'] += $Qadd;
            }
            redirect("index.php");
            break;

        case "updateQtt":
            $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            $mode = filter_input(INPUT_GET, "mode", FILTER_VALIDATE_REGEXP, [
                "options" => [
                    "regexp" => "/incr|decr/"
                ]
            ]);
            //$id == 0 est équivalent à id == false ou id == null
            if ($id >= 0 && $mode) {
                switch ($mode) {
                    case "incr":
                        $_SESSION["products"][$id]["qtt"]++;
                        break;
                    case "decr":
                        $_SESSION["products"][$id]["qtt"]--;

                        if ($_SESSION["products"][$id]["qtt"] == 0) {
                            redirect("traitement.php?action=deleteProd&id=$id");
                        }
                        break;
                }
            } else setMessage("error", "Problème de requête, réessayez !");
            break;

        case "deleteProd":
            $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

            if (isset($_SESSION['products'][$id])) {
                $name = $_SESSION['products'][$id]["name"]; //récupère le nom du produit qui va être supprimé
                unset($_SESSION['products'][$id]); //on le supprime
                /*------ACHTUNG------*/
                $_SESSION["products"] = array_values($_SESSION["products"]); //réattribue les index des produits restants
                /*----fin ACHTUNG----*/
                setMessage("success", "Le produit $name a été supprimé !");
            } else setMessage("error", "Le produit n'existe pas !");
            break;

        case "deleteAll":
            if (isset($_SESSION['products'])) {
                unset($_SESSION['products']);
                setMessage("success", "Votre panier a été vidé avec succès !");
            } else setMessage("error", "Pas de panier... pas de panier !");
            break;
    }
}

redirect("recap.php");
