<!DOCTYPE html>
<html>
  <head>
    <title>BMI - 149895.csgja.com</title>
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
				<div style="margin:.6em 0;">BMI</div>
			</div>
			<div role="main" class="ui-content">
				<p>Use this BMI-calculator to see how healthy you are.</p>
				<form method="post">
					<label for="weight">Weight (kg):</label>
					<input name="weight" id="weight" type="range" min="30" max="200" step="1" value="60" data-highlight="true">	
					<label for="length">Length (cm):</label>
					<input name="length" id="length" type="range" min="130" max="230" step="1" value="160" data-highlight="true">
					<label class="ui-hidden-accessible" for="calculate">Calculate:</label>
					<button class="ui-shadow ui-btn ui-corner-all ui-mini" id="calculate" type="submit" name="calculate">Calculate your BMI</button>
				</form>
        <?php
				if(isset($_POST["calculate"]))
				{
          $weight= $_POST["weight"];
          $cm= $_POST["length"];
          $length= $cm / 100;
          $bmi1= $weight / ($length * $length);
          $bmi2= round($bmi1,1);
          
          if($bmi2 >= 18.5 and $bmi2 <= 24.9)
          {
            echo"Your BMI is: $bmi2 <br>";
            echo'You have a healthy weight!';
            echo"<img src='/images/bmi/bmi2.jpg' style='max-width:100%; display: block;margin-left: auto;margin-right: auto' />";
          }
          elseif($bmi2 < 18.5)
          {
            echo"Your BMI is: $bmi2 <br>";
            echo'Your are underweight!';
            echo"<img src='/images/bmi/bmi1.jpg' style='max-width:100%; display: block;margin-left: auto;margin-right: auto' />";
          }
          elseif($bmi2 >= 25.0 and $bmi2 <= 29.9)
          {
            echo"Your BMI is: $bmi2 <br>";
            echo'You are overweight!';
            echo"<img src='/images/bmi/bmi3.jpg' style='max-width:100%; display: block;margin-left: auto;margin-right: auto' />";
          }
          else
          {
            echo"Your BMI is: $bmi2 <br>";
            echo'You have serious obesity!';
            echo"<img src='/images/bmi/bmi4.jpg' style='max-width:100%; display: block;margin-left: auto;margin-right: auto' />";
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