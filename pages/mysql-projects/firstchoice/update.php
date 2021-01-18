<?php  
  include "connect.php";

  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

  $articlenr = mysqli_real_escape_string($mysql,$_POST["artnr"]);
  $price = mysqli_real_escape_string($mysql,$_POST["price"]);
  $cat = mysqli_real_escape_string($mysql,$_POST["cat"]); $cat = ucfirst($cat);
  $descr = mysqli_real_escape_string($mysql,$_POST["descr"]); $descr = ucfirst($descr);

  $result = mysqli_query($mysql,"SELECT count(*) AS cntArticle FROM artikel WHERE Artikelnr='".$articlenr."'") or die("Error: The selection of the articlenr has failed.");
  $row = mysqli_fetch_array($result);
  $countarticle = $row['cntArticle'];

  if($countarticle < 1)
  {
    echo'<p class="failure">The article number does not exist.</p>';
  }
  else
  {
    if(!empty($price)){mysqli_query($mysql,"UPDATE artikel SET Verkoopprijs = '$price' WHERE Artikelnr='".$articlenr."'") or die("Error: Updating the article price has failed.");}
    if(!empty($cat)){mysqli_query($mysql,"UPDATE artikel SET Categorie = '$cat' WHERE Artikelnr='".$articlenr."'") or die("Error: Updating the article category has failed.");}
    if(!empty($descr)){mysqli_query($mysql,"UPDATE artikel SET Omschrijving = '$descr' WHERE Artikelnr='".$articlenr."'") or die("Error: Updating the article description has failed.");}
    echo'<p class="succes">The article was succesfully updated.</p>';
  }
  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
?>