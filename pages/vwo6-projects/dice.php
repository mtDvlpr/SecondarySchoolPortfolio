<?php
  session_start();
  if(isset($_POST["reset"]))
  {
  	unset($_SESSION["throw1"]);
    unset($_SESSION["amount"]);
    unset($_SESSION["record"]);
  }
  if(isset($_POST["again"]))
  {
  	$_SESSION["throw1"] = 1;
  	$_SESSION["throw2"] = 1;
  	$_SESSION["throw3"] = 1;
    $_SESSION["amount"] = 0;
  }
  if(!isset($_SESSION["throw1"]))
  {
  	$_SESSION["throw1"] = 1;
  	$_SESSION["throw2"] = 1;
  	$_SESSION["throw3"] = 1;
  }
  if(!isset($_SESSION["amount"]))
  {
  	$_SESSION["amount"] = 0;
  }
  if(!isset($_SESSION["record"]))
  {
  	$_SESSION["record"] = 999;
  }
  if(isset($_POST["send"]))
  {
  	$amount = $_SESSION["amount"];
  	$amount++;
  	$_SESSION["amount"] = $amount;
  	$send = $_POST["send"];
  	$throw = rand(1,6);
  	if($send == 1){$_SESSION["throw1"] = $throw;}
    if($send == 2){$_SESSION["throw2"] = $throw;}
  	if($send == 3){$_SESSION["throw3"] = $throw;}
  }
  $throw1 = $_SESSION["throw1"];
  $throw2 = $_SESSION["throw2"];
  $throw3 = $_SESSION["throw3"];
  $amount = $_SESSION["amount"];
  $record = $_SESSION["record"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Three dice - 149895.csgja.com</title>
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
    <a href="/" title="Home"><img id="logo" src="/images/logos/logo-256.png"/></a>
<?php if(isset($_SESSION["login"])){$username=$_SESSION["username"];echo"      <div style='margin-left:20px;margin-top:-20px;'><p style='font-size:20px;'>Logged in as: <span class='notranslate'>$username</span></p></div>
";}?>
    <center>
      <h1>Three dice</h1>
      <h2>Try to get three 6's within the shortest amount of throws.</h2>
      <table style="margin: auto; margin-top: 10px;">
        <tr>
          <td>
            <form method="post">
              <input type="hidden" name="send" value="1" />
              <input type="image" style="background-color: black;" src="/images/dice/dice<?php echo"$throw1"; ?>.gif" style="max-width:100%" />
            </form>
          </td>
          <td>
            <form method="post">
              <input type="hidden" name="send" value="2" />
              <input type="image" style="background-color: black;" src="/images/dice/dice<?php echo"$throw2"; ?>.gif" style="max-width:100%" />
            </form>
          </td>
          <td>
            <form method="post">
              <input type="hidden" name="send" value="3" />
              <input type="image" style="background-color: black;" src="/images/dice/dice<?php echo"$throw3"; ?>.gif" style="max-width:100%" />
            </form>
          </td>
        </tr>
      </table>
      <br>
      <?php
          if($throw1==6 and $throw2==6 and $throw3==6)
          {
            echo"You did it in $amount times!";
            if($amount<$record){$_SESSION["record"]=$amount;}
            $_SESSION["throw1"] = 1;
            $_SESSION["throw2"] = 1;
            $_SESSION["throw3"] = 1;
            $_SESSION["amount"] = 0;
          }
          else
          {
            echo"The amount of throws: $amount";
            if($record<999){echo"<br> Record: $record";};
          }

      ?>
      <form method="post">
        <br>
        <button class="button" id="again" type="submit" name="again">Play again</button>
        <?php if($record<999){echo"<button class='button' id='reset' type='submit' name='reset'>Reset record</button>";}?>
      </form>
    </center>

    <!-- Googe Translate -->
    <div id="google_translate_element"></div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>
