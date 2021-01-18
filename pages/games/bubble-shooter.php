<?php session_start();if(!isset($_SESSION["login"])){header("Location: /");}$username=$_SESSION["username"];?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bubble Shooter - 149895.csgja.com</title>
    <meta charset="utf-8">
    <meta name="author" content="Manoah T"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/games.css">
  </head>
  <body>

    <!-- Menu -->
    <span title="Menu" class="openbtn" onclick="openNav()"><img src="/images/menu.svg"/></span>
    <div id="myNav" class="overlay">
      <a href="/logout" class='logout'>Log out</a>
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <h2 class="nav-title">Menu</h2>
        <a href="/">Home</a>
        <a href="/account">Your account</a>
        <a href="/vwo-4">VWO 4 projects</a>
        <a href="/vwo-6">VWO 6 projects</a>
        <a href="/mysql">MySQL projects</a>
        <a href="/games">Games</a>
        <a href="/about">About me</a>
        <a href="/contact">Contact</a>
      </div>
    </div>

    <br>
    <a href="/" title="Home"><img id="logo" src="/images/logos/logo-256.png"/></a>
    <div style="margin-left:20px;margin-top:-20px;"><p style="font-size:20px;">Logged in as: <?php echo"<span class='notranslate'>$username</span>";?></p></div>
    <center>
      <h1>Bubble Shooter</h1>
      <table>
        <tr>
          <td>
            <iframe src="/iframes/bubble-shooter.html"></iframe>
          </td>
        </tr>
      </table>
    </center>

    <!-- Googe Translate -->
    <div id="google_translate_element"></div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>
