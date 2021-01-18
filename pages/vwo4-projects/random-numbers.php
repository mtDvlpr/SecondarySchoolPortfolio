
<!DOCTYPE html>
<html>
  <head>
    <title>Numbers - 149895.csgja.com</title>
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
				<div style="margin:.6em 0;">Random numbers</div>
			</div>
			<div role="main" class="ui-content">
				This webapp generates random numbers for simulations.<br><br>
				<form method="post">
					<label for="range">Choose a range:</label>
					<input name="range" id="range" type="range" min="0" max="9" step="1" value="5" data-highlight="true">
					<label for="amount">Choose an amount:</label>
					<input name="amount" id="amount" type="range" min="1" max="100" step="1" value="50" data-highlight="true">					
					<label class="ui-hidden-accessible" for="simulate">Simulate:</label>
					<button class="ui-shadow ui-btn ui-corner-all ui-mini" id="simulate" type="submit" name="simulate">Simulate</button>
				</form>
        <?php
          if(isset($_POST["simulate"]))
          {
            $range= $_POST["range"];
            $amount= $_POST["amount"];
            for($counter=1;$counter<=$amount;$counter++) 
              {
                echo rand(1,$range)." "; 
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