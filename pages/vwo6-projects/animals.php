<?php
  session_start();
  if(isset($_POST["reset"]))
  {
    unset($_SESSION["animals"]);
    unset($_SESSION["animal"]);
    unset($_SESSION["answer"]);
    unset($_SESSION["count"]);
  }
  if(!isset($_SESSION["animals"]))
  {
    $_SESSION["animals"]= array("horse","monkey","bear","bee","duck","squirrel","goat","giraffe","shark","cow");
  }
  $animals= $_SESSION["animals"];
  if(!isset($_SESSION["animal"]) or isset($_POST["new"]))
  {
    $_SESSION["animals"] = array_diff($animals,array($_SESSION["answer"]));
    $animals = $_SESSION["animals"];
    $_SESSION["animal"]= $animals[array_rand($animals)];
    $_SESSION["result"]=0;
  }
  $animal= $_SESSION["animal"];
  if(isset($_POST["animal"]))
  {
    $answer= $_POST["animal"];
    if($animal=== $answer)
    {
      $_SESSION["result"]=1;
    }
    else
    {
      $_SESSION["result"]=2;
    }    
  }
  $result=$_SESSION["result"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Animals - 149895.csgja.com</title>
    <meta charset="utf-8">
    <meta name="author" content="Manoah T"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
    
    <!-- JavaScript -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
  </head>
  <body>
		<div id="pag1" data-role="page" data-theme="b">
			 <div data-role="header" style="text-align: center;">
        <a href="/vwo-6" target="_self" class="ui-btn ui-corner-all ui-icon-arrow-l ui-btn-icon-notext"></a>
        <div style="margin:.6em 0;">Animal names</div>
			  <form method="post"><button class="ui-btn-right" data-icon="recycle" type="submit" name="reset" data-iconpos="notext"></button></form>
			</div>
			<div role="main" class="ui-content">
				<form method="post" id="form1">
					<label class="ui-hidden-accessible" for="new">New:</label>
					<button class="ui-shadow ui-btn ui-corner-all ui-mini" id="new" type="submit" name="new" <?php if($_SESSION["count"]==10){echo"disabled=disabled'";}?>>Get another animal</button>
				</form>	
				<div style=" text-align:center;"><?php if($_SESSION["count"]<10){echo"<img src='/images/animals/$animal.jpg' max-width='100%' />";}?></div>			
        <form method="post">
          <div data-role="collapsible" data-mini="true" <?php if($result==1 or $_SESSION["count"]==10){echo"class='ui-disabled'";}?>>
            <h4>Animal names:</h4>
            <ul data-role="listview">
              <button type="submit" data-mini="true" name="animal" value="horse">Horse</button>
              <button type="submit" data-mini="true" name="animal" value="monkey">Monkey</button>
              <button type="submit" data-mini="true" name="animal" value="bear">Bear</button>
              <button type="submit" data-mini="true" name="animal" value="bee">Bee</button>
              <button type="submit" data-mini="true" name="animal" value="duck">Duck</button>
              <button type="submit" data-mini="true" name="animal" value="squirrel">Squirrel</button>
              <button type="submit" data-mini="true" name="animal" value="goat">Goat</button>
              <button type="submit" data-mini="true" name="animal" value="giraffe">Giraffe</button>
              <button type="submit" data-mini="true" name="animal" value="shark">Shark</button>
              <button type="submit" data-mini="true" name="animal" value="cow">Cow</button>				
            </ul>
          </div>
        </form>
        <?php
          if($_SESSION["count"]==10)
          {
            echo"Congratulations! You have learned all animal names!";
          }
          if(isset($_POST["animal"]))
          {
            $answer= $_POST["animal"];
            if($animal=== $answer)
            {
              echo"Good job! That is a $animal.";
              $_SESSION["answer"]=$answer;
              $_SESSION["count"]++;
            }
            else
            {
              echo"That's not good. Try again!";
            }
          }
        ?>
			</div>
			<div data-role="footer" data-position="fixed">
				<h3>&copy; Manoah T</h3>
			</div>
		</div>
  </body>
</html>