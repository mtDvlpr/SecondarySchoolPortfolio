<?php
  $ip = $_SERVER['REMOTE_ADDR'];

  if($ip != '81.207.215.254' and $ip != '31.149.155.205' and $ip != '31.149.155.206')
  {
    include "connect.php";
    $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");    
    mysqli_query($mysql,"INSERT INTO Visitors (IP,Date,Type) VALUES('$ip',DATE_FORMAT(NOW()-500, '%Y-%m-%d %T'),'Visitor')") or die("Error: Inserting the visit has failed.");
    mysqli_close($mysql) or die("Error: The closing of the server connection has failed.");
  }
?>