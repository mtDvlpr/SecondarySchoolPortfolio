<!DOCTYPE html>
<html>
  <head>
    <title>BMW - 149895.csgja.com</title>
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
				<div style="margin:.6em 0;">Your BMW</div>
			</div>
			<div role="main" class="ui-content">
				 <div class="ui-body ui-body-b ui-corner-all">
					<?php
					if(isset($_POST["send"]))
					{
            $name = $_POST["name"];
            $model= $_POST["model"];
            $fuel= $_POST["fuel"];
            $year= $_POST["year"];
            $color= $_POST["color"];
            $kilometers= $_POST["kilometers"];
            $options= $_POST["options"];
            $price= $_POST["price"];
            echo"<h2>Filled in by you:</h2>";
            echo"Name: $name<br />";
            echo"Model: $model<br />";
            echo"Type of fuel: $fuel<br />";
            echo"Year built: $year<br />";
            echo"color: $color<br />";
            echo"Kilometers: $kilometers<br />";
            echo"Extra option: $options<br />";
            echo"Price: $price<br />";
					}
					?>
          <a href="assemble" target="_self" class="ui-btn ui-corner-all">Go back</a>
				</div>
			</div>
			<div data-role="footer" data-position="fixed">
				<h3>&copy; Manoah T</h3>
			</div>
		</div>
  </body>
</html>