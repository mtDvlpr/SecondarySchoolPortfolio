<!DOCTYPE html>
<html>
  <head>
    <title>Higher-lower - 149895.csgja.com</title>
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
			<div data-role="header" style="text-align:center;">
        <a href="/vwo-4" target="_self" class="ui-btn ui-corner-all ui-icon-arrow-l ui-btn-icon-notext"></a>
				<div style="margin:.6em 0;">Higher-lower game</div>
			</div>
			<div role="main" class="ui-content">		
				<p>The computer picks a random number between 1 and 10. Have a guess!</p>
				<form method="post">
					<label for="number">Pick a number:</label>
					<input name="number" id="number" type="range" min="1" max="10" step="1" value="5" data-highlight="true">	
					<label class="ui-hidden-accessible" for="guess">Guess:</label>
					<button class="ui-shadow ui-btn ui-corner-all ui-mini" id="guess" type="submit" name="guess">Guess</button>
				</form>
        <?php
          session_start();
          if(!isset($_SESSION["answer"]))
          {
            $_SESSION["answer"] = rand(1,10);
          }
          else
          {
            $answer = $_SESSION["answer"];
          }
          if(isset($_POST["guess"]))
          {
            $number= $_POST["number"];
            echo"<div style='text-align:center;'>";
            if($answer > $number)
            {
              echo"<img src='/images/games/higher.png' style='max-width:100%;' />";
            }
            elseif($answer < $number)
            {
              echo"<img src='/images/games/lower.png' style='max-width:100%;' />";
            }
            else
            {
              echo"<img src='/images/games/winner.png' style='max-width:100%;' />";unset($_SESSION["answer"]);
            }
            echo"</div>";
          }
				?>
			</div>
			<div data-role="footer" data-position="fixed">
				<h3>&copy; Manoah T</h3>
			</div>
		</div>
  </body>
</html>