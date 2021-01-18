<?php
  $scooters = array("Retro Trendy","Classic Vintage","Vespeline Premium","Retro Futuro","Grande Retro");
  $prices = array(699,1249,999,899,849);
  $sc_pr = array("Retro Trendy"=>699,"Classic Vintage"=>1249,"Vespeline Premium"=>999,"Retro Futuro"=>899,"Grande Retro"=>849);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	  <title>Scooters - 149895.csgja.com</title>
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
    <a href="/" title="Home"><img id="logo" src="/images/logos/logo-256.png"/></a>
<?php if(isset($_SESSION["login"])){$username=$_SESSION["username"];echo"    <div style='margin-left:20px;margin-top:-20px;'><p style='font-size:20px;'>Logged in as: <span class='notranslate'>$username</span></p></div>
";}?>
    <center>
      <h1>Scooters</h1>
      <form method="post">
        <select name="choice" id="select" onchange="submit()">
          <option value="">Make a choice</option>
          <option value="1">Sort names</option>
          <option value="2">Sort prices</option>
          <option value="3">Sort names with prices</option>
          <option value="4">Sort prices with names</option>
        </select>
      </form>
      <?php
        if(isset($_POST["choice"]))
        {
          $choice = $_POST["choice"];
          if($choice == 1)
          {
            sort($scooters);
            for($x = 0;$x < 5;$x++)
            {
              echo"$scooters[$x]<br />";
            }
          }
          if($choice == 2)
          {
            sort($prices);
            for($x = 0;$x < 5;$x++)
            {
              echo"$prices[$x]<br />";
            }
          }
          if($choice == 3)
          {
            ksort($sc_pr);
            foreach($sc_pr as $x => $x_value)
            {
              echo"$x $x_value<br />";
            }
          }
          if($choice == 4)
          {
            asort($sc_pr);
            foreach($sc_pr as $x => $x_value)
            {
              echo"$x $x_value<br />";
            }
          }
        }
      ?>
    </center>

    <!-- Googe Translate -->
    <div id="google_translate_element"></div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>
