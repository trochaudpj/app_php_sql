<?php echo "<div class='figure box ". $affichage." ";
if (isset($row['name_categorie'])) echo  $row['name_categorie'] ;
echo"'><img class='vignette' src='img/" . $row['img'] . "' width=200>";

echo "<div><h3><a  href='product.php?id=" . $row['id'] . "'>" . $row['name'] ." ". "</a>" . $row['price'] . "€</h3></div><div><p>" . $row['description'] . "</p></div>";
echo "";
if (isset($row['name_categorie'])) echo '<em>#'. $row['name_categorie']."</em>" ;
echo "<form method='POST' action='traitement.php?action=addProd&id=" . $row['id'] . "'>"; 

?>
<label>Ajouter au panier</label>
<div>
<select  id="Qadd" name="Qadd" value='1'>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>
<input   type="submit"></div>
</form><?php 
echo "<a href='admin.php?id=".$row['id']."'>Modifier</a>"; ?>

</div><br>