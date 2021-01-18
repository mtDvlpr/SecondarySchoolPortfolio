<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>First Choice - 149895.csgja.com</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Manoah T"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/mysql.css">
    <link rel="stylesheet" type="text/css" href="/css/table.css">
    <link rel="stylesheet" type="text/css" href="/css/form.css">
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
    <img src="/images/scrollBack.svg" id="scrollbtn" onclick="topFunction()"/>
    <a href="/" title="Home"><img id="logo" src="/images/logos/logo-256.png"/></a>
<?php if(isset($_SESSION["login"])){$username=$_SESSION["username"];echo"    <div style='margin-left:20px;margin-top:-20px;'><p style='font-size:20px;'>Logged in as: $username</p></div>
";}?>
    <h1>First Choice</h1>

    <!-- Choice form -->
    <form>
      <label style="font-size: 25px;" class="container" for="request">
        <input type="radio" id="request" name="page" onclick="submit()" value="request"<?php if($_GET["page"]=="request"){echo' checked="checked"';}?>>
        Request articles
        <span class="checkmark"></span>
      </label>
      <label style="font-size: 25px;" class="container" for="insert">
        <input type="radio" id="insert" name="page" onclick="submit()" value="insert"<?php if($_GET["page"]=="insert"){echo' checked="checked"';}?>>
        Insert articles
        <span class="checkmark"></span>
      </label>
      <label style="font-size: 25px;" class="container" for="update">
        <input type="radio" id="update" name="page" onclick="submit()" value="update"<?php if($_GET["page"]=="update"){echo' checked="checked"';}?>>
        Update articles
        <span class="checkmark"></span>
      </label>
      <label style="font-size: 25px;" class="container" for="delete">
        <input type="radio" id="delete" name="page" onclick="submit()" value="delete"<?php if($_GET["page"]=="delete"){echo' checked="checked"';}?>>
        Delete articles
        <span class="checkmark"></span>
      </label>
    </form>
    <?php
      if(isset($_GET["select"]))
      {
        $category = $_GET["category"];
        $min = $_GET["min"];
        $max = $_GET["max"];
        $order = $_GET["order"];

        if(empty($category) or empty($order))
        {
          echo"<center>Fill in everything.</center>";
        }
        elseif($min<0 or $min>500 or $max<0 or $max>500)
        {
          echo"<center>Choose a price range between 0 and 500.</center>";
        }
        elseif($min>$max)
        {
          echo"<center>Choose a maximum price higher than the minimum price.</center>";
        }
      }
    ?>

    <!-- Welcome screen -->
    <div id="welcome"<?php if (isset($_GET["page"]) or isset($_GET["select"])){echo' style="display: none"';}?>>
      <center><header>Take a look at our store!</header></center>
    </div>

    <!-- Request articles -->
    <div id="request"<?php if ($_GET["page"]!="request"){echo' style="display: none"';}?>>

      <!-- Filter form -->
      <form style="margin-left:10px;">
        <label style="margin:20px">Category:</label>
        <select name="category" style="width:120px;margin: 5px 0 10px 30px" class="select" required>
          <?php
            include "connect.php";

            $mysql1 = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
            $result1 = mysqli_query($mysql1,"SELECT DISTINCT Categorie FROM artikel ORDER BY Categorie") or die("Error: The selection of the categories has failed.");
            mysqli_close($mysql1) or die("Error: Closing the server connection has failed.");

            echo nl2br("<option value='All'>All</option>\n",false);
            while(list($category) = mysqli_fetch_row($result1))
              {
                echo nl2br("          <option value='$category'>$category</option>\n",false);
              }
          ?>
        </select>
        <br>
        <div class="slidecontainer">
          <label for="min">Minimum price:</label>
          <input type="range" id="minin" name="min" min="0" max="500" value="10" class="slider" oninput="minout.value = minin.value" required>
          <output id="minout">10</output>
        </div>
        <br>
        <div class="slidecontainer">
          <label for="max">Maximum price:</label>
          <input type="range" id="maxin" name="max" min="0" max="500" value="200" class="slider" oninput="maxout.value = maxin.value" required>
          <output id="maxout">200</output>
        </div>
        <label style="margin:20px">Order by:</label>
        <select name="order" style="width:120px;margin: 10px 0 10px 40px" class="select" required>
          <option value="Artikelnr">Article nr.</option>
          <option value="Omschrijving">Description</option>
          <option value="Categorie">Category</option>
          <option value="Verkoopprijs">Price</option>
        </select>
        <br>
        <input type="submit" name="select" class="button" style="margin-left:20px;" value="Select articles">
      </form>
    </div>

    <!-- Insert articles -->
    <div id="insert"<?php if ($_GET["page"]!="insert"){echo' style="display: none"';}?>>
      <center>
<?php
if(!isset($_SESSION["login"])){echo"        <p>You have to <a href='/'>log in</a> to insert articles.</p>
";}
if(isset($_SESSION["login"]) and $_SESSION["admin"]<2){echo"        <p>You don't have the rights to Insert articles. You have to be a level 2 admin.</p>
";}?>
        <div class="form-container"<?php if(!isset($_SESSION["login"]) or $_SESSION["admin"]<2){echo" style='display:none;'";}?>>
          <form method="post" autocomplete="off">
            <?php
              if(isset($_POST["insert"]))
              {
                $articlenr = $_POST["artnr"];
                $description = ucfirst($_POST["descr"]);
                $category = ucfirst($_POST["cat"]);
                $price = $_POST["price"];

                if($_SESSION["admin"]<2 or !isset($_SESSION["login"]))
                {
                  echo"<p class='failure'>You don't have the rights to insert articles.</p>";
                }
                elseif(empty($articlenr) or empty($description) or empty($category) or empty($price))
                {
                  echo"<p>Fill in everything.<p>";
                }
                elseif(is_numeric($articlenr))
                {
                  echo"<p>Fill in a valid article number.<p>";
                }
                elseif(is_numeric($description))
                {
                  echo"<p>Fill in a valid description.<p>";
                }
                elseif(is_numeric($category))
                {
                  echo"<p>Fill in a valid category.<p>";
                }
                elseif(!is_numeric($price))
                {
                  echo"<p>Fill in a valid price.<p>";
                }
                else
                {
                  include "insert.php";
                }
              }
              ?>
            <div class="row">
              <div class="col-20">
                <label for="artnr">Article nr.</label>
              </div>
              <div class="col-60">
                <input type="text" id="artnr" name="artnr" placeholder="F0445" required>
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="descr">Description</label>
              </div>
              <div class="col-60">
                <input type="text" id="descr" name="descr" placeholder="Aerobics shoes Flits" required>
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="cat">Category</label>
              </div>
              <div class="col-60">
                <input type="text" id="cat" name="cat" list="categories" placeholder="Fitness" required>
                <datalist id="categories">
<?php
  include "connect.php";

  $mysql1 = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
  $result1 = mysqli_query($mysql1,"SELECT DISTINCT Categorie FROM artikel ORDER BY Categorie") or die("Error: The selection of the categories has failed.");
  mysqli_close($mysql1) or die("Error: Closing the server connection has failed.");

  while(list($category) = mysqli_fetch_row($result1))
    {
      echo nl2br("                  <option>$category</option>\n",false);
    }
?>
                </datalist>
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="price">Price €</label>
              </div>
              <div class="col-60">
                <input type="number" id="price" name="price" placeholder="70" required>
              </div>
            </div>
            <div class="row">
              <input type="submit" name="insert" value="Insert">
            </div>
          </form>
        </div>
      </center>
    </div>

    <!-- Update articles -->
    <div id="update"<?php if ($_GET["page"]!="update"){echo' style="display: none"';}?>>
      <center>
<?php
if(!isset($_SESSION["login"])){echo"        <p>You have to <a href='/'>log in</a> to update articles.</p>
";}
if(isset($_SESSION["login"]) and $_SESSION["admin"]<2){echo"        <p>You don't have the rights to update articles. You have to be a level 2 admin.</p>
";}?>
        <div class="form-container"<?php if(!isset($_SESSION["login"]) or $_SESSION["admin"]<2){echo" style='display:none;'";}?>>
          <form method="post" autocomplete="off">
            <p>If you don't want to change something, leave it blank.</p>
            <?php
              if(isset($_POST["update"]))
              {
                function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
                }

                $articlenr = $_POST["artnr"];
                $description = $_POST["descr"];
                $category = test_input($_POST["cat"]);
                $price = $_POST["price"];

                if($_SESSION["admin"]<2 or !isset($_SESSION["login"]))
                {
                  echo"<p class='failure'>You don't have the rights to update articles.</p>";
                }
                elseif (!empty($category) and !preg_match("/^[a-zA-Z ]*$/",$category))
                {
                  echo"<p>Fill in a valid category.</p>";
                }
                elseif(empty($articlenr))
                {
                  echo"<p>Fill in an article number.</p>";
                }
                elseif(is_numeric($articlenr))
                {
                  echo"<p>Fill in a valid article number.<p>";
                }
                elseif(!empty($description) and is_numeric($description))
                {
                  echo"<p>Fill in a valid description.<p>";
                }
                elseif(!empty($category) and is_numeric($category))
                {
                  echo"<p>Fill in a valid category.<p>";
                }
                elseif(!empty($price) and !is_numeric($price))
                {
                  echo"<p>Fill in a valid price.<p>";
                }
                else
                {
                  include "update.php";
                }
              }
            ?>
            <div class="row">
              <div class="col-20">
                <label for="artnr">Article nr. <span style="font-size:10px;">(required)</span></label>
              </div>
              <div class="col-60">
                <select name="artnr" required>
<?php
  include "connect.php";

  $mysql1 = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
  $result1 = mysqli_query($mysql1,"SELECT DISTINCT Artikelnr FROM artikel ORDER BY Artikelnr") or die("Error: The selection of the article numbers has failed.");
  mysqli_close($mysql1) or die("Error: Closing the server connection has failed.");

  while(list($articlenr) = mysqli_fetch_row($result1))
    {
      echo nl2br("                  <option value='$articlenr'>$articlenr</option>\n",false);
    }
?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="descr">Description</label>
              </div>
              <div class="col-60">
                <input type="text" id="descr" name="descr" placeholder="Aerobics shoes Flits">
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="cat">Category</label>
              </div>
              <div class="col-60">
                <input type="text" id="cat" name="cat" list="categories" placeholder="Fitness">
                <datalist id="categories">
<?php
  include "connect.php";

  $mysql1 = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
  $result1 = mysqli_query($mysql1,"SELECT DISTINCT Categorie FROM artikel ORDER BY Categorie") or die("Error: The selection of the categories has failed.");
  mysqli_close($mysql1) or die("Error: Closing the server connection has failed.");

  while(list($category) = mysqli_fetch_row($result1))
    {
      echo nl2br("                  <option>$category</option>\n",false);
    }
?>
                </datalist>
              </div>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="price">Price €</label>
              </div>
              <div class="col-60">
                <input type="number" id="price" name="price" placeholder="70">
              </div>
            </div>
            <div class="row">
              <input type="submit" name="update" value="Update">
            </div>
          </form>
        </div>
      </center>
    </div>

    <!-- Delete articles -->
    <div id="delete"<?php if ($_GET["page"]!="delete"){echo' style="display: none"';}?>>
      <center>
<?php
if(!isset($_SESSION["login"])){echo"        <p>You have to <a href='/'>log in</a> to delete articles.</p>
";}
if(isset($_SESSION["login"]) and $_SESSION["admin"]<2){echo"        <p>You don't have the rights to delete articles. You have to be a level 2 admin.</p>
";}?>
        <div class="form-container"<?php if(!isset($_SESSION["login"]) or $_SESSION["admin"]<2){echo" style='display:none;'";}?>>
          <form method="post">
            <?php
              if(isset($_POST["delete"]))
              {
                $articlenr = $_POST["artnr"];

                if($_SESSION["admin"]<2 or !isset($_SESSION["login"]))
                {
                  echo"<p class='failure'>You don't have the rights to delete articles.</p>";
                }
                elseif(empty($articlenr))
                {
                  echo"<p>Choose an article number.</p>";
                }
                else
                {
                  include "delete.php";
                }
              }
            ?>
            <div class="row">
              <div class="col-20">
                <label for="artnr">Article nr.</label>
              </div>
              <div class="col-60">
                <select name="artnr" required>
<?php
  include "connect.php";

  $mysql1 = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
  $result1 = mysqli_query($mysql1,"SELECT DISTINCT Artikelnr FROM artikel ORDER BY Artikelnr") or die("Error: The selection of the article numbers has failed.");
  mysqli_close($mysql1) or die("Error: Closing the server connection has failed.");

  while(list($articlenr) = mysqli_fetch_row($result1))
    {
      echo nl2br("                  <option value='$articlenr'>$articlenr</option>\n",false);
    }
?>
                </select>
              </div>
            </div>
            <div class="row">
              <input type="submit" name="delete" value="Delete">
            </div>
          </form>
        </div>
      </center>
    </div>
    <?php
      if(isset($_GET["select"]))
      {
        $category = $_GET["category"];
        $min = $_GET["min"];
        $max = $_GET["max"];
        $order = $_GET["order"];

        if(empty($category) or empty($order)){}
        elseif($min<0 or $min>500 or $max<0 or $max>500){}
        elseif($min>$max){}
        else
        {
          $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
          if($category=="All")
          {
            $result = mysqli_query($mysql,"SELECT * FROM artikel WHERE Verkoopprijs>=".$min." AND Verkoopprijs<=".$max." ORDER BY $order") or die("Error: The selection of the articles has failed.");
          }
          else
          {
            $result = mysqli_query($mysql,"SELECT * FROM artikel WHERE Categorie='".$category."' AND Verkoopprijs>=".$min." AND Verkoopprijs<=".$max." ORDER BY $order") or die("Error: The selection of the articles has failed.");
          }
          mysqli_close($mysql) or die("Error: Closing the server connection has failed.");

          echo"
    <table>
      <tr>
         <th>Article nr</th>
         <th>Description</th>
         <th>Category</th>
         <th>Price</th>
      </tr>";

         while(list($articlenr,$description,$category,$price) = mysqli_fetch_row($result))
           {
              echo"
      <tr>
        <td>$articlenr</td>
        <td>$description</td>
        <td>$category</td>
        <td>€ $price</td>
      </tr>";
           }
        echo"
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
