<!DOCTYPE html>
<html lang="en">
  <head>
    <title>VWO 4 - 149895.csgja.com</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Manoah T"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">

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
      <a href="/" title="Home"><img style="float:left;width:50px;margin: -12px 10px 0px 10px;" src="/images/logos/logo-256.png"/></a>
<?php if(isset($_SESSION["login"])){$username=$_SESSION["username"];echo"      <div style='margin-left:20px;margin-top:-20px;'><p style='font-size:20px;'>Logged in as: <span class='notranslate'>$username</span></p></div>
";}?>
      <center>
        <h2>VWO 4 projects</h2>
        <table>
          <tr>
            <td>
              <ul>
                <li><a href="/vwo-4/cereals">Cereals</a></li>
                <br>
                <li><a href="/vwo-4/colors">Learn colors</a></li>
                <br>
                <li><a href="/vwo-4/fingers">Count fingers</a></li>
                <br>
                <li><a href="/vwo-4/bmi">Calculate BMI</a></li>
                <br>
                <li><a href="/vwo-4/taxi">Calculate taxi ride</a></li>
                <br>
                <li><a href="/vwo-4/random-numbers">Random numbers</a></li>
                <br>
                <li><a href="/vwo-4/bakery/home">Bread and banquet</a></li>
                <br>
                <li><a href="/vwo-4/higher-lower">Higher-lower game</a></li>
                <br>
                <li><a href="/vwo-4/bmw/assemble">Assemble your BMW</a></li>                
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