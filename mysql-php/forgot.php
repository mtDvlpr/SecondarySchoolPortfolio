<?php
  include "connect.php";

  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

  $usname = mysqli_real_escape_string($mysql,$_POST['usname']);
  $email = mysqli_real_escape_string($mysql,$_POST["email"]);
  $confirm = mysqli_real_escape_string($mysql,$_POST["confirm"]);

  $result = mysqli_query($mysql,"SELECT count(*) AS cntUser FROM Users WHERE Username='".$usname."' AND Email='".$email."'") or die("Error: The selection of the account has failed.");
  $row = mysqli_fetch_array($result);
  $count = $row['cntUser'];

  if($count > 0)
  {
    $query = mysqli_query( $mysql,"SELECT Password FROM UsersBackup WHERE Username='".$usname."'") or die("Error: The selection of the name has failed.");
    $password = mysqli_fetch_all($query,MYSQLI_ASSOC);
    $pass = $password[0]["Password"];
    mail("$email","Forgot password","Dear $usname,\n\nYou have forgotten your password for 149895.csgja.com.\nYour password is: '$pass'.\nIf you did not forget your password, you can ignore this mail.\n\nKind regards,\n\n\nManoah T",'From:noreply@149895.csgja.com');
    echo"<script language='javascript'>alert('You have received an email from us containing your current password.')</script>";
  }
  else
  {
    echo"<script language='javascript'>alert('Your username did not match your email.')</script>";
  }
  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
?>