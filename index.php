<?php
  session_start();
  include "mysql-php/visitors.php";
  if(isset($_POST['login']))
  {
    if(!empty($_POST['antispam'])) die();
    include "mysql-php/log.php";
    include "mysql-php/verification.php";
  }

  if(isset($_SESSION["login"])){header("Location: /home");}

  if(isset($_SESSION["expire"])){$_SESSION["time_remaining"] = round(($_SESSION["expire"] - time()) / 60, 0);}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home - 149895.csgja.com</title>

    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="author" content="Manoah Tervoort">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-square70x70logo" content="/images/icons/smalltile.png">
    <meta name="msapplication-square150x150logo" content="/images/icons/mediumtile.png">
    <meta name="msapplication-wide310x150logo" content="/images/icons/widetile.png">
    <meta name="msapplication-square310x310logo" content="/images/icons/largetile.png">
    <meta name="google-site-verification" content="TcxMw-_2aRPHHTPyw8qJf3N235n7cXv3aupzEc4tP-M">

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
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
          <h2 class="nav-title">Menu</h2>
          <a href="/">Home</a>
          <a href="/vwo-4">VWO 4 projects</a>
          <a href="/vwo-6">VWO 6 projects</a>
          <a href="/mysql">MySQL projects</a>
          <a href="/about">About me</a>
          <a href="/contact">Contact</a>
        </div>
      </div>

      <!-- Login form -->
      <div id="id01" class="modal">
         <form id="form01" class="modal-content animate" method="post" autocomplete="off">
            <div class="imgcontainer">
               <span onclick="document.getElementById('id01').style.display='none'" class="close">&times;</span>
               <img src="/images/avatar.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
              <label for="username"><b>Username</b></label>
              <input type="text" id="username" name="usname" maxlength="15" placeholder="Username" required>
              <label for="pswlogin"><b>Password</b></label>
              <input type="password" id="pswlogin" name="psw" maxlength="30" placeholder="Password"required>
              <input type="text" name="antispam" style="display:none;" />
              <input type="submit" name="login" value="Log in">
              <label>
                <input type="checkbox" name="remember" checked="checked">
                Remember me
              </label>
            </div>
            <div class="container" style="background-color:#f1f1f1">
              <button onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button onclick="document.getElementById('id01').style.display='none';document.getElementById('id02').style.display='block'" class="signupbtn">Sign up</button>
              <span class="psw"><a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='none';document.getElementById('id03').style.display='block'">Forgot password?</a></span>
            </div>
         </form>
      </div>

      <!-- Signup form -->
      <div id="id02" class="modal">
        <form id="form02" class="modal-content animate" method="post" autocomplete="off">
          <div class="container">
            <h1 style="text-align:center;background-color:#00ba00;">Sign Up</h1>
            <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" id="email" name="email" maxlength="40" placeholder="Email" required>

            <label for="name"><b>First name</b></label>
            <input type="text" id="name" name="name" maxlength="10" placeholder="First name" required>

            <label for="usname"><b>Username</b></label>
            <input type="text" id="usname" name="usname" maxlength="15" placeholder="Username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" id="psw" name="psw" maxlength="30" placeholder="Password" required>

            <label for="confirmpsw"><b>Confirm password</b></label>
            <input type="password" id="confirmpsw" name="confirmpsw" maxlength="30" placeholder="Confirm password" required>

            <input type="text" name="antispam" style="display:none;"/>
            <label>
              <input type="checkbox" name="agreed" checked="checked" required>
              I have read and agree to the <a href="/terms" target="_blank">Terms of Service</a> and the <a href="/privacy-policy" target="_blank">Privacy Policy</a>.
            </label>
            <br><br>
            <input type="submit" name="signup" value="Sign up" class="signupbtn">
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
            <button onclick="document.getElementById('id02').style.display='none';document.getElementById('id01').style.display='block'">Log in</button>
          </div>
        </form>
      </div>

      <!-- Forgot password form -->
      <div id="id03" class="modal">
         <form id="form03" class="modal-content animate" method="post" autocomplete="off">
            <div class="imgcontainer">
               <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
              <h1 style="text-align:center;color:black;">Forgot password?</h1>
              <p style="color:black;text-align:center;">An email will be sent containing your current password.</p>
              <hr>
              <label for="user"><b>Username:</b></label>
              <input type="text" id="user" name="usname" maxlength="15" placeholder="Username" required>

              <label for="emailforgot"><b>Email:</b></label>
              <input type="email" id="emailforgot" name="email" maxlength="40" placeholder="Email" required>

              <label for="confirm"><b>Confirm email:</b></label>
              <input type="email" id="confirm" name="confirm" maxlength="40" placeholder="Confirm email" required>

              <input type="text" name="antispam" style="display:none;"/>
              <input type="submit" name="forgot" value="Send">
            </div>
            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
         </form>
      </div>
      <?php
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        function is_valid_mail($mail) {
          $mail_domains_ko = array('gmail.com','live.nl','ja.nl','jamail.nl','outlook.com','hotmail.com','mac.com','icloud.com','me.com','yahoo.com','msn.com','googlemail.com');
          foreach($mail_domains_ko as $ko_mail) {
            list(,$mail_domain) = explode('@',$mail);
            if(strcasecmp($mail_domain, $ko_mail) == 0){
              return true;
            }
          }
          return false;
        }

        if(isset($_POST["forgot"]))
        {
          if(!empty($_POST['antispam'])){ die();}
          $usname = $_POST["usname"];
          $email = $_POST["email"];
          $confirm = $_POST["confirm"];

          if(empty($usname) or empty($email) or empty($confirm))
          {
            echo'<script language="javascript">alert("Fill everything in.")</script>';
          }
          elseif ($email != $confirm)
          {
            echo'<script language="javascript">alert("Your email does not match.")</script>';
          }
          else
          {
            include "mysql-php/forgot.php";
          }
        }

        if(isset($_POST["signup"]))
        {
          if(!empty($_POST['antispam'])){ die();}
          $name = ucfirst($_POST["name"]);
          $usname = $_POST["usname"];
          $password = $_POST["psw"];
          $confirmpsw = $_POST["confirmpsw"];
          $email = $_POST["email"];
          $emailtest = test_input($_POST["email"]);
          $nametest = test_input($_POST["name"]);

          if(empty($name) or empty($usname) or empty($password) or empty($confirmpsw) or empty($email))
          {
            echo'<script language="javascript">alert("Fill everything in.")</script>';
          }
          elseif ($password != $confirmpsw)
          {
            echo'<script language="javascript">alert("Your password does not match.")</script>';
          }
          elseif (!filter_var($emailtest, FILTER_VALIDATE_EMAIL) or !is_valid_mail($email))
          {
            echo'<script language="javascript">alert("Fill in a valid email.\nIf you are sure your email is valid, contact the admin.")</script>';
          }
          elseif (!preg_match("/^[a-zA-Z ]*$/",$nametest))
          {
            echo'<script language="javascript">alert("Fill in a valid first name.")</script>';
          }
          elseif (!isset($_POST["agreed"]))
          {
            echo'<script language="javascript">alert("Verify that you have read and agree with our Terms of Service and Privacy Policy.")</script>';
          }
          else
          {
            include "mysql-php/insert.php";
          }
        }
      ?>

      <br>
      <div class="btncontainer">
        <img src="/images/scrollBack.svg" id="scrollbtn" onclick="topFunction()"/>
        <a href="/" title="Home"><img id="logo" class="HomeLogo" src="/images/logos/logo-256.png"/></a>
        <button onclick="document.getElementById('id01').style.display='block';">Log in</button>
        <button onclick="document.getElementById('id02').style.display='block';" class="signupbtn">Sign up</button>
      </div>
      <header><?php
        $ip = $_SERVER['REMOTE_ADDR'];
        if($ip=="217.120.238.94"){echo"Hey Tychobeer!";}
        elseif($ip=="217.63.233.197"){echo"Hey Karstoontje!";}
        elseif($ip=="217.121.213.68"){echo"Hey Kassieboi!";}
        elseif($ip=="86.94.220.94"){echo"Hey Alexis!";}
        else{echo"Hello World!";}
        ?></header>
      <?php if(isset($_POST["popup"])) {$_SESSION["popup"]=1;}$popup = $_SESSION["popup"];?>

      <!-- Callout message -->
      <div class="callout"<?php if($popup==1){echo' style="display: none;"';}?>>
        <div class="callout-header">Play now! <?php echo"$popup";?></div>
        <form method="post" class="calloutform">
          <button name="popup" class="closebutton" onclick="this.parentElement.parentElement.style.display='none';submit();">×</button>
        </form>
        <div class="callout-container">
          <p>Sign up to play fun games.</p>
        </div>
      </div>

      <!-- Googe Translate -->
      <div id="google_translate_element"></div>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/validateEmail.js"></script>
    <script type="text/javascript" src="/js/validatePassword.js"></script>
    <script type="text/javascript" src="/js/cookieinfo.min.js" id="cookieinfo" ></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>
