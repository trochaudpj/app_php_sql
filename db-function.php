<?php
require("connect.php");

function connexion()
{

    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ];
    try {
        $db = new \PDO($dsn, USER, PASSWD, $options);
    } catch (\PDOException $e) {
        printf("Échec de la connexion : %s\n", $e->getMessage());
        exit();
    }
    return $db;
}

function findAll()
{
    $sql = "SELECT * FROM product";
    $stmt = connexion()->query($sql);
    return ($stmt->fetchAll());
}

function findOneById($id)
{
    $sql = "SELECT * FROM product WHERE id= :id";
    $stmt = connexion()->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return ($stmt->fetch());
}

function insertProduct($name, $description, $price,$img)
{
    $sql = "INSERT INTO product (name, description, price, img) VALUES (:name,:description,:price,:img)";
    $bddtmp = connexion();
    $stmt = $bddtmp->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":img", $img);
    $stmt->execute();
    $lastId = $bddtmp->lastInsertId();
    return $lastId;
}
function modifProduct($name, $description, $price,$img,$id)
{
    $sql = "UPDATE product SET name =:name, description=:description, price=:price, img=:img where id=:id";
    $bddtmp = connexion();
    $stmt = $bddtmp->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":img", $img);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $lastId = $bddtmp->lastInsertId();
    return $lastId;
}