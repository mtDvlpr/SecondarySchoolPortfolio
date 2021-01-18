<?php
  session_start();
  if(isset($_POST["reset"]))
  {
    unset($_SESSION["reset"]);
    unset($_SESSION["suitcases"]);
  }
  if(!isset($_SESSION["reset"]))
  {
    $_SESSION["reset"]=0;
  }
  if(!isset($_SESSION["suitcases"]))
  {
    $_SESSION["suitcases"] = array("Suitcase 1","Suitcase 2","Suitcase 3","Suitcase 4","Suitcase 5","Suitcase 6","Suitcase 7","Suitcase 8","Suitcase 9");
  }
  $suitcases = $_SESSION["suitcases"];
  $amount = count($suitcases);

  for($counter = 0;$counter < $amount;$counter++)
  {
    if(isset($_POST["$counter"]))
    {
      array_splice($suitcases,$counter,1);
      $_SESSION["reset"]++;
    }
  }
  $_SESSION["suitcases"] = $suitcases;
  $suitcases = $_SESSION["suitcases"];
  $amount = count($suitcases);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	  <title>Suitcases - 149895.csgja.com</title>
    <meta charset="utf-8">
    <meta name="author" content="Manoah T"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/vwo-6.css">
  </head>
  <body>
    
    <!-- Menu -->
    <span title="Menu" class="openbtn" onclick="openNav()"><img src="/images/menu.svg"/></span>
    <div id="myNav" class="overlay">
<?php if(isset($_SESSION["login"])){echo'      <a href="/logout" class="logout">Log out</a>
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
      <h1>Suitcases</h1>
      <form method="post">
        <?php
          for($counter = 0;$counter < $amount;$counter++)
          {
            echo"<button class='button' type='submit' name='$counter'>".$suitcases[$counter]."</button>";
          }
          if($_SESSION["reset"]==9){echo"<button class='button' type='submit' name='reset'>Reset</button>";}
        ?>
      </form>			
    </center>
    
    <!-- Googe Translate -->
    <div id="google_translate_element"></div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>