<?php
require("connect.php");

/**
 * Retourne une instance de PDO, représentant la connexion à la base de données
 * @return \PDO un objet instance de PDO, connecté à la base de données
 */
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
    } catch (PDOException $e) {
        printf("Échec de la connexion : %s\n", $e->getMessage());
        exit();
    }
    return $db;
}
/**
 * Retourne tous les produits de la base de données
 * 
 * @return array|false 
 * Renvoie un tableau contenant les produits sous forme de tableau, 
 * un tableau vide si aucun produit n'est présent en base
 * ou FALSE si la requète a échoué
 */
function findAll()
{
    $sql = "SELECT * FROM product p INNER JOIN categorie c ON p.categorie=c.id_categorie";
    $stmt = connexion()->query($sql);
    return ($stmt->fetchAll());
}
/**
 * Retourne toutes les categories en base
 * 
 * @return array|false un tableau contenant toutes les categories ou FALSE si aucune categorie n'a été récupéré
 */
function findAllCategorie()
{
    $sql = "SELECT * FROM categorie";
    $stmt = connexion()->query($sql);

    return ($stmt->fetchAll());
}
/**
 * Retourne le produit en base de données correspondant à l'id en paramètre
 * 
 * @param int $id l'identifiant du produit en BDD
 * @return array|false un tableau contenant les champs du produit ou FALSE si aucun produit n'a été récupéré
 */
function findOneById($id)
{
    $sql = "SELECT * FROM product WHERE id= :id";
    $stmt = connexion()->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return ($stmt->fetch());
}
/**
 * ajoute un produit en base de données 
 * 
 * @param name $name le nom du produit
 * @param description $description la description du produit
 * @param price $price le prix du produit
 * @param img $img l image du produit
 * @param categorie $categorie la categorie du produit
 * @return int|false un entier du produit insere ou FALSE si aucun produit n'a été insere
 */
function insertProduct($name, $description, $price, $img, $categorie)
{
    $sql = "INSERT INTO product (name, description, price, img,categorie) VALUES (:name,:description,:price,:img,:categorie)";
    $bddtmp = connexion();
    $stmt = $bddtmp->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":img", $img);
    $stmt->bindParam(":categorie", $categorie);
    $stmt->execute();
    $lastId = $bddtmp->lastInsertId();
    return $lastId;
}
function modifProduct($name, $description, $price, $img, $categorie, $id)
{
    $sql = "UPDATE product SET name =:name, description=:description, price=:price, img=:img, categorie=:categorie where id=:id";
    $bddtmp = connexion();
    $stmt = $bddtmp->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":img", $img);
    $stmt->bindParam(":categorie", $categorie);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $lastId = $bddtmp->lastInsertId();
    return $lastId;
}
function deleteProduct($id)
{
    $sql = "DELETE FROM product WHERE id=:id";
    $stmt = connexion()->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt;
};
