<?php include "menu.php";
if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
?>
    <p>Aucun produit en session...</p>
<?php
} else {
?> <div class="container">
        <div class="box" id="recap">
            <table class="table table-success  table-striped table-hover table-bordered">
                <thead class='table-dark'>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalGeneral = 0;

                    foreach ($_SESSION['products'] as $index => $product) {
                        //on calcule le total de la ligne ici
                        $totalLigne = $product['price'] * $product['qtt'];
                    ?>
                        <tr>
                            <td><?= $index ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= number_format($product['price'], 2, ",", "&nbsp;") ?>&nbsp;€</td>
                            <td><a href='traitement.php?action=updateQtt&id=<?= $index ?>&mode=decr'><i class="fas fa-minus-square"></i></a>
                                <?= $product['qtt'] ?>
                                <a href='traitement.php?action=updateQtt&id=<?= $index ?>&mode=incr'><i class="fas fa-plus-square"></i></a>
                            </td>
                            <td><?= number_format($totalLigne, 2, ",", "&nbsp;") ?>&nbsp;€</td>
                            <td><a href='traitement.php?action=deleteProd&id=<?= $index ?>' data-bs-toggle="tooltip" data-bs-placement="right" title="Effacer article"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    <?php
                        $totalGeneral += $totalLigne;
                    }
                    ?>
                    <tr>
                        <td colspan=3>
                            <a href='traitement.php?action=deleteAll' data-bs-toggle="tooltip" data-bs-placement="right" title="Vider le panier"><i class="far fa-trash-alt"></i></a>
                        </td>
                        <td><?= getFullQtt() ?></td>
                        <td><strong><?= number_format($totalGeneral, 2, ",", "&nbsp;") ?>&nbsp;€</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        <?php
    }
        ?>
        </div>
    </div>
    <?php include "footer.php"; ?>