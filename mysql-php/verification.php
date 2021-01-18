<?php
  if($_SESSION["try"]>2){$_SESSION["time_remaining"] = round(($_SESSION["expire"] - time()) / 60, 0);}
  if(isset($_SESSION["expire"]) and $_SESSION["time_remaining"]<1){unset($_SESSION["try"]);unset($_SESSION["expire"]);}
  if(!isset($_SESSION["try"])){$_SESSION["try"]=0;}
  if($_SESSION["try"]>2)
  {
    $_SESSION["time_remaining"] = round(($_SESSION["expire"] - time()) / 60, 0);
    $time_remaining = $_SESSION["time_remaining"];
    echo "<script language='javascript'>alert('Logging in is temporarly disabled due to too many failed login attempts. Try again in $time_remaining minute(s).')</script>";
  }
  else
  {
    include "connect.php";

    $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

    $usname = mysqli_real_escape_string($mysql,$_POST['usname']);
    $password = mysqli_real_escape_string($mysql,$_POST['psw']);
    $remember = $_POST["remember"];

    if ($usname != "" && $password != "")
    {
      include "encryption.php";
      $password = crypt($password,$salt);
      $result = mysqli_query($mysql,"SELECT count(*) AS cntUser FROM Users WHERE Username= BINARY'".$usname."' AND Password= BINARY'".$password."'") or die("Error: The selection of the account has failed.");
      $row = mysqli_fetch_array($result);
      $count = $row['cntUser'];

      if($count > 0)
      {
        $result = mysqli_query($mysql,"SELECT count(*) AS cntUser FROM Users WHERE Username= BINARY'".$usname."' AND Password= BINARY'".$password."' AND Active='1'") or die("Error: The selection of the account has failed.");
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
        
        if($count > 0)
        {
          $query1 = mysqli_query( $mysql,"SELECT Name FROM Users WHERE Username='".$usname."'") or die("Error: The selection of the name has failed.");
          $names = mysqli_fetch_all($query1,MYSQLI_ASSOC);
          $query2 = mysqli_query( $mysql,"SELECT Admin FROM Users WHERE Username='".$usname."'") or die("Error: The selection of the admin rights has failed.");
          $adminnr = mysqli_fetch_all($query2,MYSQLI_ASSOC);
          session_start();
          $_SESSION["admin"] = $adminnr[0]["Admin"];
          $_SESSION["login"] = $names[0]["Name"];
          $_SESSION["username"] = $usname;
          unset($_SESSION["try"]);
        }
        else
        {
          echo "<script language='javascript'>alert('Make sure your account is activated.')</script>";
        }
      }
      else
      {
        echo "<script language='javascript'>alert('Username or password is invalid.')</script>";
        $_SESSION["try"]++;
      }
    }
    else
    {
      echo "<script language='javascript'>alert('Fill in your username and password.')</script>";
    }
    mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
  }
  if($_SESSION["try"]>1 and $_SESSION["try"]<3){echo "<script language='javascript'>alert('You failed to log in twice. You have one more try before logging in will be disabled for a while.')</script>";}
  if($_SESSION["try"]>2 and $_SESSION["try"]<4){$_SESSION["expire"] = time()+600;echo "<script language='javascript'>alert('Logging in is disabled for a while.')</script>";$_SESSION["try"]++;}
?>