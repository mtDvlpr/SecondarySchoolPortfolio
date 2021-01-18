<?php
  session_start();

  if(isset($_POST["vote"]))
  {
    $type = $_POST["type"];

    include "connect.php";

    $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
    mysqli_query($mysql,"UPDATE Quiz SET Votes = Votes + 1 WHERE Type = '".$type."'") or die("Error: Updating the votes has failed.");
    mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
  }

  include "connect.php";

  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

  $result = mysqli_query($mysql,"SELECT * FROM Quiz") or die("Error: The selection of the votes has failed.");
  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vote - 149895.csgja.com</title>
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

    <!-- AJAX API -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
		<?php
			while(list($type,$votes) = mysqli_fetch_row($result))
			{
			echo"['$type',$votes],";
			}
		?>
        ]);

        // Set chart options
        var options = { 'width': '100%',
                        'height': '100%',
                        is3D: true,
                        legend: {alignment: 'center'},
                        chartArea: {left: 0,top: 0,height: '100%',width: '100%'},
                        backgroundColor: { fill:'transparent' }};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
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
<?php if(isset($_SESSION["login"])){$username=$_SESSION["username"];echo"    <div style='margin-left:20px;margin-top:-20px;'><p style='font-size:20px;'>Logged in as: $username</p></div>
";}?>
    <h1>Vote</h1>

    <!-- Choice form -->
    <form>
      <label style="font-size: 25px;" class="container" for="chkFirst">
        <input type="radio" id="chkFirst" name="page" onclick="submit()" value="vote"<?php if($_GET["page"]=="vote"){echo' checked="checked"';}?>>
        Vote
        <span class="checkmark"></span>
      </label>
      <label style="font-size: 25px;" class="container" for="chkSecond">
        <input type="radio" id="chkSecond" name="page" onclick="submit()" value="votes"<?php if($_GET["page"]=="votes"){echo' checked="checked"';}?>>
        Show votes
        <span class="checkmark"></span>
      </label>
      <label style="font-size: 25px;" class="container" for="chkThird">
        <input type="radio" id="chkThird" name="page" onclick="submit()" value="chart"<?php if($_GET["page"]=="chart"){echo' checked="checked"';}?>>
        Show vote chart
        <span class="checkmark"></span>
      </label>
    </form>

    <!-- Welcome screen -->
    <div id="welcome"<?php if (isset($_GET["page"])){echo' style="display: none"';}?>>
      <center><header>Vote on your favorite app type!</header></center>
    </div>

    <!-- Vote -->
    <div id="vote"<?php if ($_GET["page"]!="vote"){echo' style="display: none"';}?>>
      <center>
        <div class="form-container vote-container">
          <form method="post">
            <?php if(isset($_POST["vote"])){echo'<p class="succes">Your vote was succesfully saved!</p>';}?>
            <div class="row">
              <h1>What is your favorite type of app?</h1>
            </div>
            <div class="row">
              <div class="col-20">
                <label for="type">App type <span style="font-size:10px;">(required)</span></label>
              </div>
              <div class="col-60">
                <select name="type" required>
<?php
  include "connect.php";

  $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");
  $result = mysqli_query($mysql,"SELECT DISTINCT Type FROM Quiz ORDER BY Type") or die("Error: The selection of the app types has failed.");
  mysqli_close($mysql) or die("Error: Closing the server connection has failed.");

  while(list($type) = mysqli_fetch_row($result))
    {
      echo nl2br("                  <option value='$type'>$type</option>\n",false);
    }
?>
                </select>
              </div>
            </div>
            <div class="row">
              <input type="submit" name="vote" value="Vote">
            </div>
          </form>
        </div>
      </center>
    </div>

    <!-- Votes -->
    <div id="votes"<?php if ($_GET["page"]!="votes"){echo' style="display: none"';}?>>
      <?php
        include "connect.php";

        $mysql = mysqli_connect($server,$user,$pass,$db) or die("Error: There is no connection to the database.");

        $result = mysqli_query($mysql,"SELECT * FROM Quiz") or die("Error: The selection of the votes has failed.");
        mysqli_close($mysql) or die("Error: Closing the server connection has failed.");

        echo"<table>
        <tr>
           <th>Type</th>
           <th>Votes</th>
        </tr>";

         while(list($type,$votes) = mysqli_fetch_row($result))
           {
              echo"
        <tr>
          <td>$type</td>
          <td>$votes</td>
        </tr>";
           }
        echo"
      </table>";
      ?>
    </div>

    <!-- Vote chart -->
    <div id="chart"<?php if ($_GET["page"]!="chart"){echo' style="display: none"';}?>>
        <center>
          <h3 style="margin-left:-150px">App type preference</h3>
          <div id='chart_div'></div>
      </center>
    </div>

    <!-- Googe Translate -->
    <div id="google_translate_element"></div>

    <!-- JavaScript -->
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>
