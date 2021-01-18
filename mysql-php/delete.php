<?php
  include "connect.php";

  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
  
  $usname = mysqli_real_escape_string($mysql,$_POST["usname"]);

  mysqli_query($mysql,"DELETE FROM Users WHERE Username='".$usname."'") or die("Error: Deleting the account has failed.");
  mysqli_query($mysql,"DELETE FROM UsersBackup WHERE Username='".$usname."'") or die("Error: Deleting the account has failed.");
  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
?>