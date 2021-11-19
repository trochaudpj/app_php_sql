<?php
include "menu.php";
?><div class="container main">
<?php
$affichage=" screen";

$row = findOneById($_GET['id']);
if ($row) {
    include "vignette.php";
} else {
    echo "erreur de connection";
}?>
</div><?php include "footer.php"; ?>