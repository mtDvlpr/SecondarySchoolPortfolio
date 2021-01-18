<!DOCTYPE html>
<html>
  <head>
    <title>Taxi - 149895.csgja.com</title>
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
				<div style="margin:.6em 0;">Taxi ride</div>
			</div>
			<div role="main" class="ui-content">
				<p>With this webapp you can estimate your taxi ride costs.</p>
				<form method="post">
					<label for="kilometers">Number of kilometers:</label>
					<input name="kilometers" id="calculation" type="range" min="1" max="100" step="1" value="50" data-highlight="true">	
					<label for="minutes">Number of minutes:</label>
					<input name="minutes" id="calculation" type="range" min="1" max="120" step="1" value="60" data-highlight="true">				
					<label class="ui-hidden-accessible" for="calculate">Calculate:</label>
					<button class="ui-shadow ui-btn ui-corner-all ui-mini" id="calculate" type="submit" name="calculate">Calculate</button>
				</form>
				<?php
          if(isset($_POST["calculate"]))
          {
            $km = $_POST["kilometers"];
            $min = $_POST["minutes"];
            $answer = 2.89 + (2.12 * $km) + (0.35 * $min);
            echo"The estimated total cost of this ride is: &euro; $answer";
          }
				?>	
			</div>
			<div data-role="footer" data-position="fixed">
				<h3>&copy; Manoah T</h3>
			</div>
		</div>
  </body>
</html>