<?php
include "menu.php";
?> <div class="container main">
    <?php $loop = findAllCategorie(); ?>

    <nav id="gallery-menu" class="side-spaced">
        <div id="gallery-filters">
            <a class="active" href="#">ALL</a>
            <?php
            if (isset($loop)) {
                foreach ($loop as $index => $id_categorie) {
            ?>
                    <a href="#" data-type='<?php if (isset($index)) echo $id_categorie['name_categorie'] ?>'><?php if (isset($index)) echo $id_categorie['name_categorie'] ?></a>
            <?php
                }
            }
            ?>
        </div>
    </nav>
</div>
<div id="gallery" class="container main">
    <?php

    $affichage = " card";
    foreach (findAll() as $row) {
        $row['description'] = substr($row['description'], 0, 50);
        include "vignette.php";
    } ?>
    
</div>
<?php include "footer.php"; ?>