<?php session_start();include "../mysql-php/users.php";if(!isset($_SESSION["login"])){header("Location: /");}$username=$_SESSION["username"];?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home - 149895.csgja.com</title>
    
    <!-- Metadata -->
    <meta charset="utf-8"/>
    <meta name="author" content="Manoah T"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-square70x70logo" content="/images/icons/smalltile.png" />
    <meta name="msapplication-square150x150logo" content="/images/icons/mediumtile.png" />
    <meta name="msapplication-wide310x150logo" content="/images/icons/widetile.png" />
    <meta name="msapplication-square310x310logo" content="/images/icons/largetile.png" />
    
    <!-- Icons -->
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/images/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/images/icons/android-chrome-192x192.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="stylesheet" type="text/css" href="/css/callout.css">
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
        <a href="/logout" class="logout">Log out</a>
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
      <a href="/" title="Home"><img style="float:left;width:50px;margin: -12px 10px 0px 10px;" src="/images/logos/logo-256.png"/></a>
      <div style="margin-left:20px;margin-top:-20px;"><p style="font-size:20px;">Logged in as: <?php echo"<span class='notranslate'>$username</span>";?></p></div>
      <header>Welcome <?php $name=$_SESSION["login"];echo"$name";?>!</header>
      <?php if(isset($_POST["popup"])) {$_SESSION["popup"]=1;}$popup = $_SESSION["popup"];?>
      
      <!-- Callout message -->
      <div class="callout"<?php if($popup==1){echo' style="display: none;"';}?>>
        <div class="callout-header">Vote now!</div>
        <form method="post" class="calloutform">
          <button name="popup" class="closebutton" onclick="this.parentElement.parentElement.style.display='none';submit();">×</button>
        </form>
        <div class="callout-container">
          <p><a href="/mysql/vote">Click here</a> to vote on your favorite app type.</p>
        </div>
      </div>
      
      <!-- Googe Translate -->
      <div id="google_translate_element"></div>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/cookieinfo.min.js" id="cookieinfo" ></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>