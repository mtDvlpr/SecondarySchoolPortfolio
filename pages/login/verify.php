<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Verify account - 149895.csgja.com</title>
    <meta charset="utf-8">
    <meta name="author" content="Manoah T"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/vwo-6.css">
    
    <style>
      .linkButton { 
        background: none;
        border: none;
        color: #0066ff;
        text-decoration: underline;
        cursor: pointer;
        margin:0 0 0 0;
        font-size: 35px;
      }
    </style>
  </head>
  <body>
    
    <!-- Menu -->
    <span title="Menu" class="openbtn" onclick="openNav()"><img src="/images/menu.svg"/></span>
    <div id="myNav" class="overlay">
<?php session_start();if(isset($_SESSION["login"])){echo'      <a href="/logout" class="logout">Log out</a>
';}?>
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <h2 class="nav-title">Menu</h2>
        <a href="/">Home</a>
<?php if(isset($_SESSION["login"])){echo'        <a href="/account">Your account</a>
';}?>
        <a href="/vwo-4">VWO 4 projects</a>
        <a href="/vwo-6">VWO 6 projects</a>
        <a href="/mysql">MySQL projects</a>
<?php if(isset($_SESSION["login"])){echo'        <a href="/games">Games</a>
';}?>
        <a href="/about">About me</a>
        <a href="/contact">Contact</a>
      </div>
    </div>
    
    <br>
    <a href="/" title="Home"><img style="float:left;width:50px;margin: -12px 10px 0px 10px;" src="/images/logos/logo-256.png"/></a>
<?php if(isset($_SESSION["login"])){$username=$_SESSION["username"];echo"    <div style='margin-left:20px;margin-top:-20px;'><p style='font-size:20px;'>Logged in as: <span class='notranslate'>$username</span></p></div>
";}?>
    <center>
      <h1><?php 
      if(isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash']))
      {
        if(isset($_POST["verify"]))
        {
          include "../../mysql-php/connect.php";

          $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

          $email = mysqli_real_escape_string($mysql,$_GET['email']);
          $hash = mysqli_real_escape_string($mysql,$_GET['hash']);

          $result = mysqli_query($mysql,"SELECT count(*) AS cntUser FROM Users WHERE Email='$email' AND Hash='$hash'") or die("The selection of the account has failed.");
          $row = mysqli_fetch_array($result);
          $count = $row['cntUser'];

          if($count > 0)
          {
            mysqli_query($mysql,"UPDATE Users SET Active='1',Hash='' WHERE Email='".$email."' AND Hash='$hash' AND Active='0'") or die("The activation of the account has failed.");
            echo 'Your account has been activated, you can now log in.';
          }
          else
          {
            echo"You have inserted an invalid url or your account is already activated.";
          }
          mysqli_close($mysql) or die("The closing of the server connection has failed.");
        }
        else
        {
          echo'<form method="post">Click <input type="submit" name="verify" class="linkButton" value="here"> to activate your account.</form>';
        } 
      }
      else
      {
        echo"You have inserted an invalid url.";
      }?></h1>
    </center>
    
    <!-- Googe Translate -->
    <div id="google_translate_element"></div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/cookieinfo.min.js" id="cookieinfo" ></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>