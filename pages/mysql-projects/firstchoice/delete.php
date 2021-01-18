<?php
  include "connect.php";
    
  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

  $articlenr = mysqli_real_escape_string($mysql,$_POST["artnr"]);

  $result = mysqli_query($mysql,"SELECT count(*) AS cntArtnr FROM artikel WHERE Artikelnr='".$articlenr."'") or die("Error: The selection of the articlenr has failed.");
  $row = mysqli_fetch_array($result);
  $countartnr = $row['cntArtnr'];

  if($countartnr < 1)
  {
    echo'<p class="failure">The article number does not exist.</p>';
  }
  else
  {
    mysqli_query($mysql,"DELETE FROM artikel WHERE Artikelnr='".$articlenr."'") or die("Error: Deleting the article has failed.");
    echo'<p class="succes">The article was succesfully deleted from the database.</p>';
  }
  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
?>