<!-- check.php -->
<?php
  if($_SESSION["try"]>2){$_SESSION["time_remaining"] = round(($_SESSION["expire"] - time()) / 60, 0);}
  if(isset($_SESSION["expire"]) and $_SESSION["time_remaining"]<1){unset($_SESSION["try"]);unset($_SESSION["expire"]);}
  if(!isset($_SESSION["try"])){$_SESSION["try"]=0;}
  
if($_SESSION["try"]>2)
  {
    $_SESSION["time_remaining"] = round(($_SESSION["expire"] - time()) / 60, 0);
    $time_remaining = $_SESSION["time_remaining"];
    echo "<script language='javascript'>alert('Logging in is temporarly disabled due to too many failed login attempts. Try again in $time_remaining minute(s).')</script>";
  }
  else
  { 
    if(Inloggegevens kloppen)
    {
      echo "<script language='javascript'>alert('You logged in succesfully!')</script>";
      unset($_SESSION["try"]);
    }
    else
    {
      echo "<script language='javascript'>alert('Username or password is invalid!')</script>";
      $_SESSION["try"]++;
    }
  }
  if($_SESSION["try"]>1 and $_SESSION["try"]<3){echo "<script language='javascript'>alert('You failed to log in twice. You have one more try before logging in will be disabled for a while!')</script>";}
  if($_SESSION["try"]>2 and $_SESSION["try"]<4){$_SESSION["expire"] = time()+600;echo "<script language='javascript'>alert('Logging in is disabled for a while!')</script>";$_SESSION["try"]++;}
?>

<!-- inloggen.php -->
<?php
  if(isset($_SESSION["expire"])){$_SESSION["time_remaining"] = round(($_SESSION["expire"] - time()) / 60, 0);}
?>