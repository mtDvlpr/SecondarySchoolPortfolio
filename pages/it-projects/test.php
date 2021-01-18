<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Assignment 3.3 | InHolland</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Manoah T"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/form.css">
    <link rel="stylesheet" type="text/css" href="/css/test.css">

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/cookieinfo.min.js" id="cookieinfo" ></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </head>
  <body>
    <!-- Page content -->
    <div id="page" class="animate-bottom">

      <!-- Menu -->
      <span title="Menu" class="openbtn" onclick="openNav()"><img src="/images/menu.svg"/></span>
      <div id="myNav" class="overlay">
<?php session_start();if(isset($_SESSION["login"])){echo'        <a href="/logout" class="logout">Log out</a>
';}?>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
          <h2 class="nav-title">Menu</h2>
          <a href="/">Home</a>
<?php if(isset($_SESSION["login"])){echo'          <a href="/account">Your account</a>
';}?>
          <a href="/vwo-4">VWO 4 projects</a>
          <a href="/vwo-6">VWO 6 projects</a>
          <a href="/mysql">MySQL projects</a>
<?php if(isset($_SESSION["login"])){echo'          <a href="/games">Games</a>
';}?>
          <a href="/about">About me</a>
          <a href="/contact">Contact</a>
        </div>
      </div>

      <br>
      <img src="/images/scrollBack.svg" id="scrollbtn" onclick="topFunction()"/>
      <a href="/" title="Home"><img id="logo" src="/images/logos/logo-256.png"/></a>
<?php if(isset($_SESSION["login"])){$username=$_SESSION["username"];echo"      <div style='margin-left:20px;margin-top:-20px;'><p style='font-size:20px;'>Logged in as: <spanclass='notranslate'>$username</span></p></div>
";}?>
      <center>
        <h1>Hello World!</h1>
        <h2>I'm Manoah!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <article>
          <header>Well this is fun.</header>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <footer>Footer thingy</footer>
        </article>
      </center>

      <!-- Googe Translate -->
      <div id="google_translate_element"></div>
    </div>
  </body>
</html>
