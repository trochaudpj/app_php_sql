<?php
include "menu.php";
$products = findAll();
    
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$prodToUpdate = null;

if($id && $prod = findOneById($id)){
    $prodToUpdate = $prod;
}
?><div class="container main">
    <div class="box">
        <h1><?= $prodToUpdate ? "Modifier" : "Ajouter" ?> un produit</h1>
        <?php
        unset($page);
        if (isset($prodToUpdate)) {
            $page =$prodToUpdate;
           echo "<a href='traitement.php?action=delProduct&id=". $id."&mode=decr'data-bs-toggle='tooltip' data-bs-placement='right' title='Effacer produit' ><i class='far fa-trash-alt'></i>Effacer<i class='far fa-trash-alt'></i></a>";
         
        } ?>
        <form  method='POST' action='traitement.php?action=<?= $prodToUpdate ? "modifBdd" : "ajoutBdd" ?>&id=<?= $id ? $id : '' ?>'>
        
        <div class="container mb-3">
            <p>
                <label class="form-label">
                    Nom du produit : </label>
            </p>
            <input class="form-control" type="text" name="name" value="<?= $prodToUpdate ? $prodToUpdate["name"] : "" ?>">
            <p>
                <label class="form-label">
                    Prix du produit : </label>
            </p>
            <input class="form-control" type="number" step="any" name="price" value="<?= $prodToUpdate ? $prodToUpdate["price"] : "" ?>">
            <p>
                <label class="form-label">
                    Image du produit :</label>
            </p>
            <input class="form-control" type="text" name="img" value="<?= $prodToUpdate ? $prodToUpdate["img"] : "" ?>">
            <p>
                <label class="form-label">
                    Categorie du produit :</label>
            </p>
            <select class="form-control" name="categorie" value="<?= $prodToUpdate ? $prodToUpdate["categorie"] : "" ?>">
                <?php $loop = findAllCategorie();
                if (isset($loop)) {
                    foreach ($loop as $index => $id_categorie) {
                ?> <option <?php if (isset($prodToUpdate['categorie'])) {
                                if ($prodToUpdate['categorie'] == $index) {
                                    echo "selected";
                                }
                            }
                            ?> value=<?php if (isset($index))  echo  $id_categorie['id_categorie'] ?>><?php if (isset($index)) echo $id_categorie['name_categorie'] ?></option>
                <?php
                    }
                }
                ?>

            </select> 
            <div class="container">
            <p>
                <label class="form-label">
                    Description du produit :</label>
            </p>
            <textarea class="form-control" rows="5" cols="33" name="description" value="<?= $prodToUpdate ? $prodToUpdate["description"] : "" ?>"><?= $prodToUpdate ? $prodToUpdate["description"] : "" ?></textarea>
        </div>
            <input class="form-control" type="submit" name="submit" value="Valider">
            </form>
        </div>

    </div>
    <?php include "footer.php"; ?>