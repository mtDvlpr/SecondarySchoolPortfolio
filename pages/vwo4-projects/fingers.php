<?php
  session_start();
  if(isset($_POST["reset"]))
  {
    unset($_SESSION["number"]);
  }
  if(!isset($_SESSION["number"]))
  {
    $_SESSION["number"] = 1 ;
  }
  elseif(isset($_POST["next"]))
  {
    $_SESSION["number"]++;

    if($_SESSION["number"]>5)
    {
      $_SESSION["number"]=1;
    }
  }
  $number= $_SESSION["number"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Fingers - 149895.csgja.com</title>
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
				<div style="margin:.6em 0;">Count fingers</div>
			</div>
			<div role="main" class="ui-content">
				<div class="ui-body ui-body-b ui-corner-all">
          <center>
            <img src='/images/hands/hand<?php echo "$number"; ?>.jpg' style='max-width:100%;'>
          </center>
          <form method="post">
            <button class="ui-shadow ui-btn ui-corner-all ui-mini" id="next" type="submit" name="next">Next</button>
            <button class="ui-shadow ui-btn ui-corner-all ui-mini" id="reset" type="submit" name="reset">Reset</button>
          </form>	
				</div>
			</div>
			<div data-role="footer" data-position="fixed">
				<h3>&copy; Manoah T</h3>
			</div>
		</div>
  </body>
</html>