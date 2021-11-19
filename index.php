<?php
include "menu.php";
?> <div class="container main">
<?php
$affichage=" card";
foreach (findAll() as $row) {
$row['description'] = substr($row['description'], 0, 50);
 include "vignette.php";
} ?>
</table></div><?php include "footer.php"; ?>