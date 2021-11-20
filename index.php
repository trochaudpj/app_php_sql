<?php
include "menu.php";
$loop = findAllCategorie();
if (!isset($_GET['id']) || empty($_GET['id'])) {
    
?> <div class="container">
    <div class=" menu box">
        <nav id="gallery-menu" class="side-spaced">
            <div id="gallery-filters"><a class="active" href="#">ALL</a>
                <?php foreach ($loop as $index => $id_categorie) {
                    echo '<a href="#" data-type=';
                    if (!isset($_GET['id']) || empty($_GET['id'])) {
                        echo $id_categorie['name_categorie'] . ">";
                    }
                    if (!isset($_GET['id']) || empty($_GET['id'])) {
                        echo $id_categorie['name_categorie'] . "</a>";
                    }
                }
                ?>
            </div>
        </nav>
    </div></div>
<?php } ?>
<div id="gallery" class="container main">
    <?php
    $affichage = " card";
    foreach (findAll() as $row) {
        $row['description'] = substr($row['description'], 0, 50);
        include "vignette.php";
    } ?>

</div>
<?php include "footer.php"; ?>