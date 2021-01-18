<?php
  include "connect.php";
    
  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

  $articlenr = mysqli_real_escape_string($mysql,$_POST["artnr"]);
  $price = mysqli_real_escape_string($mysql,$_POST["price"]);
  $description = mysqli_real_escape_string($mysql,$_POST["descr"]);
  $category = mysqli_real_escape_string($mysql,$_POST["cat"]);

  $result = mysqli_query($mysql,"SELECT count(*) AS cntArtnr FROM artikel WHERE Artikelnr='".$articlenr."'") or die("Error: The selection of the articlenr has failed.");
  $row = mysqli_fetch_array($result);
  $countartnr = $row['cntArtnr'];

  if($countartnr > 0)
  {
    echo'<p class="failure">The article number already exists.</p>';
  }
  else
  {
    mysqli_query($mysql,"INSERT INTO artikel (Artikelnr,Omschrijving,Categorie,Verkoopprijs) VALUES('$articlenr','$description','$category','$price')") or die("Error: Inserting the new article has failed.");
    echo'<p class="succes">The article was succesfully inserted into the database.</p>';
  }
  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
?>