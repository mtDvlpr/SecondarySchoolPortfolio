<?php session_start();if(!isset($_SESSION["login"])){header("Location: /");}$usname=$_SESSION["username"];?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account - 149895.csgja.com</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Manoah T"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/table.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="stylesheet" type="text/css" href="/css/form.css">
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
      
      <!-- Remove account form -->
      <div id="id01" class="modal">
         <form id="form01" method="post" autocomplete="off" class="modal-content animate">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
              <h1 style="text-align:center;background-color:red;">Remove account</h1>
              <hr>
              <label for="usname"><b>Username</b></label>
              <input type="text" id="usname" name="usname" maxlength="15" placeholder="Username" required>
              <label for="pswforgot"><b>Password</b></label>
              <input type="password" id="pswforgot" name="psw" maxlength="30" placeholder="Password" required>
              <input type="submit" name="remove" value="Remove account">
            </div>
            <div class="container" style="background-color:#f1f1f1">
               <button onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
         </form>
      </div>
      
      <br>
      <img src="/images/scrollBack.svg" id="scrollbtn" onclick="topFunction()"/>
      <a href="/" title="Home"><img style="float:left;width:50px;margin: -12px 10px 0px 10px;" src="/images/logos/logo-256.png"/></a>
      <div style="margin-left:20px;margin-top:-20px;"><p style="font-size:20px;">Logged in as: <span class="notranslate"><?php echo"$usname";?></span></p></div>
      <div class="btncontainer" style="margin: 40px -20px 5px 1%;">
        <button onclick="document.getElementById('id01').style.display='block';" class="cancelbtn">Remove account</button>
        <button onclick="window.location.href='/admin';"<?php if(!$_SESSION["admin"]>0){echo' style="display:none;"';}?>>Admin page</button>
      </div>
      <center>
        <?php
          include "../../mysql-php/encryption.php";
          if(isset($_POST["remove"]))
          {
            $chkusname = $_SESSION["username"];
            $chkpassword = $_SESSION["password"];
            $usname = $_POST["usname"];
            $password = $_POST["psw"];
            $password = crypt($password,$salt);
            
            if($chkusname==$usname and $chkpassword==$password)
            {
              include "../../mysql-php/delete.php";header("Location: /logout");
            }  
            else
            {
              echo'<script language="javascript">alert("Your username or password is wrong.")</script>';
            }
          }
         
          include "../../mysql-php/connect.php";

          $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

          $result = mysqli_query($mysql,"SELECT * FROM Users WHERE Username='".$usname."'") or die("Error: The selection of the table items has failed.");
          mysqli_close($mysql) or die("Error: Closing the server connection has failed.");

          echo"<table>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Admin level</th>
          </tr>";

           while(list($name,$username,$password,$email,$admin) = mysqli_fetch_row($result))
             {
                if(substr( $password, 0, 3 ) === "$5$"){unset($_SESSION["login"]);}
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password; 
                echo"
          <tr>
            <td class='notranslate'>$name</td> 
            <td class='notranslate'>$email</td>
            <td class='notranslate'>$admin</td>          
          </tr>";
             }
          echo"
        </table>";        
        ?>
        
        
        <!-- Update form -->
        <div class="form-container">
          <form method="post" autocomplete="off">
            <div class="row">
              <h1>Change your information</h1>
              <p>If you don't want to change something, leave it blank.</p>
            </div>
            <?php
              if(isset($_POST["submit"]))
              {
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

                $name = test_input($_POST["name"]);
                $email = test_input($_POST["email"]);
                $newpass = $_POST["newpass"];
                $confirmpass = $_POST["confirmpass"];

                if ((!filter_var($email, FILTER_VALIDATE_EMAIL) or !is_valid_mail($email)) and !empty($email)) 
                {
                echo'<p>Fill in a valid email.</p>';
                }
                elseif (!preg_match("/^[a-zA-Z ]*$/",$name) and !empty($name))
                {
                echo'<p>Fill in a valid first name.</p>';
                }
                elseif ($newpass != $confirmpass) 
                {
                  echo'<p>Your new password does not match.</p>';
                }
                else
                {
                  include "../../mysql-php/update.php";
                }
              }
            ?>
            <div class="row">
              <div class="col-20">
                <label for="email">Email</label>
              </div>
              <div class="col-60">
                <input type="email" maxlength="40" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="name">First name</label>
              </div>
              <div class="col-60">
                <input type="text" maxlength="10" id="name" name="name" placeholder="First name">
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="oldpass">(old) Passw. <span style="font-size:10px;">(required)</span></label>
              </div>
              <div class="col-60">
                <input type="password" maxlength="30" id="oldpass" name="oldpass" placeholder="Password" required>
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="psw">New password</label>
              </div>
              <div class="col-60">
                <input type="password" maxlength="30" id="psw" name="newpass" placeholder="New password">
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="confirmpsw">Confirm password</label>
              </div>
              <div class="col-60">
                <input type="password" maxlength="30" id="confirmpsw" name="confirmpass" placeholder="Confirm new password">
              </div>
            </div>
            <div class="row">
              <input type="submit" name="submit" value="Change">
            </div>
          </form>
        </div>
      </center>
      
      <!-- Googe Translate -->
      <div id="google_translate_element"></div>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/validatePassword.js"></script>
    <script type="text/javascript" src="/js/cookieinfo.min.js" id="cookieinfo" ></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>