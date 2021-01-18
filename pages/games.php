<?php session_start();if(!isset($_SESSION["login"])){header("Location: /");}$username=$_SESSION["username"];?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Games - 149895.csgja.com</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Manoah T"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/logos/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/preloader.css">
  </head>
  <body onload="preloader()">

    <!-- Preloader -->
    <div id="loader"></div>
    <img id="loader-img" src="/images/logos/logo-256.png"/>

    <!-- Page content -->
    <div style="display:none;" id="page" class="animate-bottom">

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
      <img src="/images/scrollBack.svg" id="scrollbtn" onclick="topFunction()"/>
      <a href="/" title="Home"><img id="logo" src="/images/logos/logo-256.png"/></a>
      <div style="margin-left:20px;margin-top:-20px;"><p style="font-size:20px;">Logged in as: <?php echo"<span class='notranslate'>$username</span>";?></p></div>
      <center>
        <h2>Games</h2>
        <table>
          <tr>
            <td>
              <ul>
                <li><a href="/games/tetris">Tetris</a></li>
                <br>
                <li><a href="/games/checkers">Checkers</a></li>
                <br>
                <li><a href="/games/dunk-shot">Dunk Shot</a></li>
                <br>
                <li><a href="/games/t-rex">T-rex game</a></li>
                <br>
                <li><a href="/games/2048">2048 game</a></li>
                <br>
                <li><a href="/games/piano-tiles">Piano tiles</a></li>
                <br>
                <li><a href="/games/bubble-shooter">Bubble Shooter</a></li>
              </ul>
            </td>
          </tr>
        </table>
      </center>

      <!-- Googe Translate -->
      <div id="google_translate_element"></div>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/cookieinfo.min.js" id="cookieinfo" ></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>
