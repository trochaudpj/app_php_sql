<?php
include "menu.php";
$page = findOneById($_GET['id']);
?><div class="container main">
    <div class="box">
        <h1>Modifier un produit</h1>
        <form action="traitement.php?action=modifBdd&id=<?php echo $_GET['id'] ?>" method='POST'>
            <div class="container  mb-3">
                <p>
                    <label class="form-label">Nom du produit : </label>
                </p>
                <input class="form-control" type="text" name="name" value="<?php echo $page['name'] ?>">
                <p>
                    <label class="form-label">Prix du produit : </label>
                </p>
                <input class="form-control" type="number" step="any" name="price" value="<?php echo $page['price'] ?>">
                <p>
                    <label class="form-label">Image du produit : </label>
                </p>
                <input class="form-control" type="text" name="img" value="<?php echo $page['img'] ?>">
                <p>
                    <label class="form-label">Description du produit : </label>
                </p>
                <textarea class="form-control" rows="5" cols="40" name="description" value="<?php echo $page['description'] ?>"><?php echo $page['description'] ?></textarea>
                <p>
                    <input type="submit" name="submit" value="Modifier le produit">
                </p>
            </div>
        </form>
    </div>
</div>
<?php include "footer.php"; ?>