<?php echo "<div   class='figure box " . $affichage ." " . $row['name_categorie'] ."'><img class='vignette' src='img/" . $row['img'] . "' width=200><br>";
echo "<div><div><h2><a  href='product.php?id=" . $row['id'] . "'>" . $row['name'] ." ". "</a></h2></div><div><h2>" . $row['price'] . "€</h2></div></div><div><p>" . $row['description'] . "</p></div>";
echo "<em>#". $row['name_categorie']."</em>";
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