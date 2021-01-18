<?php
  include "connect.php";
  include "encryption.php";

  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

  $name = ucfirst(mysqli_real_escape_string($mysql,$_POST["name"]));
  $usname = $_SESSION["username"];
  $oldpass = mysqli_real_escape_string($mysql,$_POST["oldpass"]);
  $oldpass = crypt($oldpass,$salt);
  $checkpass = $_SESSION["password"];
  $newpass = mysqli_real_escape_string($mysql,$_POST["newpass"]);
  $email = mysqli_real_escape_string($mysql,$_POST["email"]);

  $result = mysqli_query($mysql,"SELECT count(*) AS cntUser FROM Users WHERE Email='".$email."'") or die("Error: The selection of the emailaddress has failed.");
  $row = mysqli_fetch_array($result);
  $countemail = $row['cntUser'];

  $query2 = mysqli_query( $mysql,"SELECT Password FROM UsersBackup WHERE Username='".$usname."'") or die("Error: The selection of the admin rights has failed.");
  $oldpassDecrypt = mysqli_fetch_all($query2,MYSQLI_ASSOC);
  $oldpassDecrypt = $oldpassDecrypt[0]["Password"];

  if($countemail > 0)
  {
    echo"<p class='failure'>Your email already belongs to another account.</p>";
  }
  elseif($oldpass==$checkpass)
  {
    $active='1';$hash="";
    if(empty($email) or $email==$_SESSION["email"]){$email=$_SESSION["email"];}else{$active='0';$hash= md5(rand(0,1000));}
    if(empty($name)){$name=$_SESSION["login"];}
    if(empty($newpass)){$newpass=$oldpassDecrypt;}
    mysqli_query($mysql,"UPDATE UsersBackup SET Name = '".$name."', Password = '$newpass', Email = '".$email."' WHERE Username='".$usname."'") or die("Error: Updating the user has failed.");
    $newpass = crypt($newpass,$salt);
    mysqli_query($mysql,"UPDATE Users SET Name = '".$name."', Password = '$newpass', Email = '".$email."', Active='$active', Hash='$hash' WHERE Username='".$usname."'") or die("Error: Updating the user has failed.");
    if(!empty($email) and $email !== $_SESSION["email"])
    {
      mail("$email","Email verification","Dear $name,\n\nYou have changed your email.\n\nClick this link to activate your account again:\nhttp://www.149895.csgja.com/verify?email=$email&hash=$hash\n\nKind regards,\n\n\n149895.csgja.com",'From:noreply@149895.csgja.com');
      echo nl2br("<p class='succes'>Your account was succesfully updated.\nVerify your new email by clicking the activation link that has been sent to it.</p>",false);
    }
    else
    {
      echo"<p class='succes'>Your account was succesfully updated. Refresh this page to see the changes.</p>";
    }
  }
  else
  {
    echo"<p class='failure'>Your old password is wrong.</p>";
  }

  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
?>