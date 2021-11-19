<?php
include "menu.php";
?><div class="container main">
    <div class="box">
        <h1>Ajouter un produit</h1>
        <form action="traitement.php?action=ajoutBdd" method="POST">
            <div class="container mb-3">
                <p>
                    <label class="form-label">
                        Nom du produit : </label>
                </p>
                <input class="form-control" type="text" name="name">
                <p>
                    <label class="form-label">
                        Prix du produit : </label>
                </p>
                <input class="form-control" type="number" step="any" name="price">
                <p>
                    <label class="form-label">
                        Image du produit :</label>
                </p>
                <input class="form-control" type="text" name="img" value="default.jpg">
            </div>
            <div class="container">
                <p>
                    <label class="form-label">
                        Description du produit :</label>
                </p>
                <textarea class="form-control" rows="5" cols="33" name="description"></textarea>
            </div>
            <p>
                <input class="form-control" type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
    </div>
</div>
<?php include "footer.php"; ?>