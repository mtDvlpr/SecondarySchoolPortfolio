<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Converter - 149895.csgja.com</title>
    <meta charset="utf-8">
    <meta name="author" content="Manoah T"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/table.css">
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
    <img src="/images/scrollBack.svg" id="scrollbtn" onclick="topFunction()"/>
    <a href="/" title="Home"><img id="logo" src="/images/logos/logo-256.png"/></a>
<?php if(isset($_SESSION["login"])){$username=$_SESSION["username"];echo"    <div style='margin-left:20px;margin-top:-20px;'><p style='font-size:20px;'>Logged in as: <span class='notranslate'>$username</span></p></div>
";}?>
    <h1>Decimal converter</h1>

    <!-- Choice form -->
    <form method="post">
      <label style="font-size: 25px;" class="container" for="chkFirst">
      <input type="radio" id="chkFirst" name="chkChoice" onclick="ShowHideDiv()"/>
      Convert a single number
      <span class="checkmark"></span>
      </label>
      <label style="font-size: 25px;" class="container" for="chkSecond">
      <input type="radio" id="chkSecond" name="chkChoice" onclick="ShowHideDiv()"/>
      Convert multiple numbers
      <span class="checkmark"></span>
      </label>
      <br>
    </form>

    <!-- Single number -->
    <div id="first" class="s_m-form" style="display: none;margin-left:30px;">
      <form>
        <span style="font-size: 25px;">What number do you want to convert?</span><br>
        <input type="number" name="number"  min="0" max="10000" required>
        <input type="submit" name="submit_single" class="button" value="Convert">
      </form>
    </div>

    <!-- Multiple numbers -->
    <div id="second" class="s_m-form" style="display: none;margin-left:30px;">
      <form>
        <span style="font-size: 25px;">Where do you want to begin?</span><br>
        <input type="number" name="start"  min="0" max="1000" required> <br>
        <span style="font-size: 25px;">How big do you want the steps to be?</span><br>
        <input type="number" name="steps"  min="1" max="100" required> <br>
        <span style="font-size: 25px;">Where do you want to end?</span><br>
        <input type="number" name="max"  min="0" max="1000" required>
        <input type="submit" name="submit_multiple" class="button" value="Convert">
      </form>
    </div>
    <?php
      if(isset($_GET["submit_multiple"]))
      {
        $start= $_GET["start"];
        $steps= $_GET["steps"];
        $max= $_GET["max"];

        if($start<0 or $start>1000)
        {
          echo '<script language="javascript">';
          echo 'alert("Choose a starting number between 0 and 1000!")';
          echo '</script>';
        }
        elseif($steps<1 or $steps>100)
        {
          echo '<script language="javascript">';
          echo 'alert("Choose a stepsize between the 1 and 100!")';
          echo '</script>';
        }
        elseif($max<0 or $max>1000)
        {
          echo '<script language="javascript">';
          echo 'alert("Choose an end number between 0 and 1000!")';
          echo '</script>';
        }
        else
        {
          echo "
    <table>
      <tr>
         <th>Decimal</th>
         <th>Binary</th>
         <th>Hexadecimal</th>
         <th>Octal</th>
      </tr>";

      for($start;$start<$max;$start+=$steps){
      $binary = decbin($start);
      $hexadecimal = dechex($start);
      $octal = decoct($start);

         echo "
      <tr>
         <td>$start</td>
         <td>$binary</td>
         <td style='text-transform: uppercase'>$hexadecimal</td>
         <td>$octal</td>
      </tr>";
      }
         $start = $max;
         $binary = decbin($start);
         $hexadecimal = dechex($start);
         $octal = decoct($start);

         echo "
      <tr>
         <td>$start</td>
         <td>$binary</td>
         <td>$hexadecimal</td>
         <td>$octal</td>
      </tr>
    </table>
      ";
        }

      }
      if(isset($_GET["submit_single"]))
      {
        $number = $_GET["number"];
        $binary = decbin($number);
        $hexadecimal = dechex($number);
        $octal = decoct($number);

        if($number<0 or $number>10000)
        {
          echo '<script language="javascript">';
          echo 'alert("Choose a number between 0 and 10000!")';
          echo '</script>';
        }
        else
        {

          echo "
      <table id='table'>
        <tr>
           <th>Decimal</th>
           <th>Binary</th>
           <th>Hexadecimal</th>
           <th>Octal</th>
        </tr>
        <tr>
           <td>$number</td>
           <td>$binary</td>
           <td>$hexadecimal</td>
           <td>$octal</td>
        </tr>
      </table>
      ";
        }
      }
    ?>

    <!-- Googe Translate -->
    <div id="google_translate_element"></div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>
