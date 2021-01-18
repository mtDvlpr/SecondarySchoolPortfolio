
<html>
<head>
	<title>
		GALGJE
	</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
    <link rel="stylesheet" href="themes/julian.min.css" />

<style>
* {color: white; }
div {color: white; }
</style>
</head>
<body>
<div id="pag1" data-role="page" data-theme="b">
			<div data-role="header">
        <a href="index.html" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-notext"></a>
				<h1>Galgje spelen</h1>
				
			</div>
			<div  role="main" class="ui-content"><br>
			<?php
session_start();
if(isset($_POST["opnieuw"])) {session_destroy(); session_start(); }
if(!isset($_SESSION["woord"])) {
    $woorden = array("aidsepidemie", "alarmsignaal", "antiekwinkel", "aspergeplant", "auteursrecht", "batterijduur", "bedrijfsauto", "beginletters", "cementstenen", "computertaal", "damesvoetbal", "dagwandeling", "demonstratie", "dierenwinkel", "entreebedrag", "etappegebied", "factuuradres", "familiediner", "hamstersoort", "havoleerling", "jeugdvoetbal", "kaartverkoop", "kattenstaart", "maandagavond", "maffialeider", "ochtendkrant", "parkeerzones", "passievrucht", "peuteropvang", "quarterbacks", "radiobericht", "rattenplagen", "saladeschaal", "schoollokaal", "tapijttegels", "tarwebroodje", "vakantiepark", "veetransport", "watersporter", "yoghurtdrank"  ); 
     //Hier zet je de woorden die geraden moeten worden 
    $rand= rand(0,count($woorden)-1);
    $woord=$woorden[$rand];
    $_SESSION["woord"]=$woord;
    $fouten=0;  $_SESSION["fouten"]=$fouten;
    $goed=0;  $_SESSION["goed"]=$goed;
     
    $letters=str_split("$woord");
    $_POST["letter"]= $letter; }
else {
$woord= $_SESSION["woord"];
    if(!isset($_SESSION["fouten"])) { $fouten=0; $_SESSION["fouten"]=$fouten;}
    $fouten= $_SESSION["fouten"];
    $letters=str_split("$woord");
    $letter= $_POST["letter"]; 
    $_SESSION["letter"]= $letter;
 if(!isset($_SESSION["goed"])) { $goed=0; $_SESSION["goed"]=$goed;}
    $goed= $_SESSION["goed"];
    }
if(isset($_POST["raad"]))
				{$letter= $_SESSION["letter"];
			if ($letter==$letters[0]) { echo"Goed zo, de 1ste letter is $letters[0]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[1]) { echo"Goed zo, de 2de letter is $letters[1]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[2]) { echo"Goed zo, de 3de letter is $letters[2]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[3]) { echo"Goed zo, de 4de letter is $letters[3]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[4]) { echo"Goed zo, de 5de letter is $letters[4]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[5]) { echo"Goed zo, de 6de letter is $letters[5]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[6]) { echo"Goed zo, de 7de letter is $letters[6]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[7]) { echo"Goed zo, de 8ste letter is $letters[7]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[8]) { echo"Goed zo, de 9de letter is $letters[8]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[9]) { echo"Goed zo, de 10de letter is $letters[9]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[10]) { echo"Goed zo, de 11de letter is $letters[10]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			elseif ($letter==$letters[11]) { echo"Goed zo, de 12de letter is $letters[11]"; ++$goed; $_SESSION["goed"]= $goed; if ($goed == 12) { Header("Location: winnaar.php"); }}
			else  {echo"Helaas, dat is niet goed";++$fouten; $_SESSION["fouten"]=$fouten;
			if ($fouten > 6) { Header("Location: dood.php"); }
			}
			}
?>
<br>
<img src='afbeeldingen/galgje<?php echo "$fouten"; ?>.png'><br><br>
<div>
<?php echo"Het te raden woord is: $woord" ?>
</div>
<form name="form1" method="post" action="twaalf.php">
      <input name="letter" type="text" id="letter" placeholder="typ de letter die je wilt raden">
  <input name="raad" type="submit" id="submit" value="RAAD">
    <input name="opnieuw" type="submit" id="opnieuw" value="Opnieuw">

</form>
				</div>
				
			<div data-role="footer" data-position="fixed">
				<h3>&copy; Manoah Tervoort & Julian van der Rijt</h3>
			</div>
			</div>

</body>

</html>