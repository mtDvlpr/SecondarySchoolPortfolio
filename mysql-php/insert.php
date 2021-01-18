<?php
  include "connect.php";
  include "encryption.php";

  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

  $name = mysqli_real_escape_string($mysql,$_POST["name"]);
  $name = ucfirst($name);
  $usname = mysqli_real_escape_string($mysql,$_POST["usname"]);
  $password = mysqli_real_escape_string($mysql,$_POST["psw"]);
  $email = mysqli_real_escape_string($mysql,$_POST["email"]);

  $result = mysqli_query($mysql,"SELECT count(*) AS cntUser FROM Users WHERE Username='".$usname."'") or die("Error: There is no connection to the database.");
  $row = mysqli_fetch_array($result);
  $countusname = $row['cntUser'];

  $result = mysqli_query($mysql,"SELECT count(*) AS cntUser FROM Users WHERE Email='".$email."'") or die("Error: The selection of the emailaddress has failed.");
  $row = mysqli_fetch_array($result);
  $countemail = $row['cntUser'];

  if($countusname > 0)
  {
    echo"<script language='javascript'>alert('Your username already exists.')</script>";
  }
  elseif($countemail > 0)
  {
    echo"<script language='javascript'>alert('Your email already belongs to another account.')</script>";
  }
  else
  {
    $hash = md5(rand(0,1000));
    mysqli_query($mysql,"INSERT INTO UsersBackup (Name,Username,Password,Email,Admin) VALUES('".$name."','".$usname."','".$password."','".$email."','0')") or die("Error: Inserting the user has failed.");
    $password= crypt($password,$salt);
    mysqli_query($mysql,"INSERT INTO Users (Name,Username,Password,Email,Admin,Active,Hash) VALUES('".$name."','".$usname."','$password','".$email."','0','0','$hash')") or die("Error: Inserting the user has failed.");
    mail("$email","Account verification","Dear $name,\n\nThank you for creating an account!\n\nClick this link to activate your account:\nhttp://www.149895.csgja.com/verify?email=$email&hash=$hash\n\nKind regards,\n\n\n149895.csgja.com",'From:noreply@149895.csgja.com');
    echo'<script language="javascript">alert("Your account has been made. Verify it by clicking the activation link that has been sent to your email.")</script>';
  }
  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
?>