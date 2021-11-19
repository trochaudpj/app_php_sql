<?php
include "menu.php";
?><div class="container main">
    <div class="box">
        <h1>Ajouter un produit</h1>
        <?php 
        unset($page);
        if (isset($_GET['id'])){
            $page = findOneById($_GET['id']);
           echo "<form action='traitement.php?action=modifBdd&id=". $_GET['id'] ."' method='POST'>";
        } else{
            echo "<form action='traitement.php?action=ajoutBdd' method='POST'>";
        }
        ?>
            <div class="container mb-3">
                <p>
                    <label class="form-label">
                        Nom du produit : </label>
                </p>
                <input class="form-control" type="text" name="name"  value="<?php if(isset($page['name'])) echo $page['name'] ?>">
                <p>
                    <label class="form-label">
                        Prix du produit : </label>
                </p>
                <input class="form-control" type="number" step="any" name="price"  value="<?php if(isset($page['price'])) echo $page['price'] ?>">
                <p>
                    <label class="form-label">
                        Image du produit :</label>
                </p>
                <input class="form-control" type="text" name="img"  value="<?php if(isset($page['img'])) echo $page['img'] ?>">
            </div>
            <div class="container">
                <p>
                    <label class="form-label">
                        Description du produit :</label>
                </p>
                <textarea class="form-control" rows="5" cols="33" name="description" value="<?php if(isset($page['description'])) echo $page['description'] ?>"><?php if(isset($page['description'])) echo $page['description'] ?></textarea>
            </div>
            <p>
                <input class="form-control" type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
    </div>
</div>
<?php include "footer.php"; ?>