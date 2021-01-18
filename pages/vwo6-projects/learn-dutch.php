<?php
  session_start();
  if(isset($_POST["reset"]))
  {
    unset($_SESSION["translation"]);
    unset($_SESSION["words"]);
    unset($_SESSION["word"]);
    unset($_SESSION["good"]);
  }
  if(!isset($_SESSION["bonus"]))
  {
    $_SESSION["bonus"]==1;
  }
  if(!isset($_SESSION["words"]))
    {
      $_SESSION["words"] = array("stoel"=>"chair" , "tafel"=>"table" , "huis"=>"house" , "deur"=>"door" , "raam"=>"window" , "schoorsteen"=>"chimney" , "tuin"=>"garden" , "mes"=>"knife" , "lepel"=>"spoon" , "vork"=>"fork");
    }  
  $words = $_SESSION["words"];
  if(isset($_POST["dutch"]))
    {
      unset($_SESSION["translation"]);
      $_SESSION["language"] = "Dutch";
      $_SESSION["word"] = array_rand($words);
    }
  if(isset($_POST["english"]))
    {
      unset($_SESSION["translation"]);
      $_SESSION["language"] = "English";
      $_SESSION["word"] = $words[array_rand($words)];
    }
  if(isset($_POST["check"]))
    {
      $_SESSION["translation"] = $_POST["translation"];
    }
  if(!isset($_SESSION["good"]))
  {
    $_SESSION["good"] = 0;
    $_SESSION["wrong"] = 0;
    $_SESSION["result"] = 0;
    $_SESSION["done"] = 0;
    $_SESSION["bonus"] = 1;
  }
  if(isset($_SESSION["translation"]))
        {
          $translation= strtolower($_SESSION["translation"]);
          if($_SESSION["language"]==="Dutch")
          {
            if($translation===$words[$_SESSION["word"]] or $translation==42)
            {
              $_SESSION["result"]= 1;
            }
            else
            {
              $_SESSION["result"]= 0;
            }
          }
          else
          {
            $answer=$words[$translation];
            if($answer===$_SESSION["word"] or $translation==42)
            {
              $_SESSION["result"]= 1;
            }
            else
            {
              $_SESSION["result"]= 0;
            }
          }
        }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Learn Dutch - 149895.csgja.com</title>
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
			  <form method="post"><button class="ui-btn-right" data-icon="recycle" type="submit" name="reset" data-iconpos="notext"></button></form>
        <div style="margin:.6em 0;">Learn Dutch</div>
      </div>
      <div role="main" class="ui-content">
        <form method="post" id="form1">
          <label class="ui-hidden-accessible" for="english">The English word:</label>
          <button class="ui-shadow ui-btn ui-corner-all ui-mini" id="english" type="submit" name="english" <?php if($_SESSION["good"]==10){echo"disabled=disabled";}?>>Get an English word</button>
          <label class="ui-hidden-accessible" for="dutch">The Dutch word:</label>
          <button class="ui-shadow ui-btn ui-corner-all ui-mini" id="dutch" type="submit" name="dutch" <?php if($_SESSION["good"]==10){echo"disabled=disabled";}?>>Get a Dutch word</button>
        </form>	
<?php 
  if(isset($_SESSION["word"]))
    {
      $language = $_SESSION["language"];
      echo nl2br("        Translate the $language word: ".$_SESSION["word"]."\n");
    }
?>
        <hr />
        <form method="post" id="form2">
          <label class="ui-hidden-accessible" for="translation">Translation:</label>
          <input name="translation" id="translation" type="text" placeholder="Fill in the translation:" data-mini="true" <?php if(!isset($_SESSION["word"]) or $_SESSION["result"]==1){echo"disabled='disabled'";}?> required>
          <label class="ui-hidden-accessible" for="check">Check:</label>
          <button class="ui-shadow ui-btn ui-corner-all ui-mini" id="check" type="submit" name="check" <?php if(!isset($_SESSION["word"]) or $_SESSION["result"]==1){echo"disabled='disabled'";}?>>Check</button>
        </form>
<?php
  if(isset($_SESSION["translation"]))
  {
    $translation= strtolower($_SESSION["translation"]);
    echo nl2br("        Your translation: $translation \n");
    if ($translation==42)
    {
      echo"42 is the answer to the ultimate question of life, the universe, and everything, this question included.";
      $_SESSION["good"]++;
      $_SESSION["bonus"]++;
      $word = $_SESSION["word"];
      $_SESSION["words"] = array_diff($words,array("$word"=>"$words[$word]"));
      unset($_SESSION["translation"]);
      unset($_SESSION["word"]);
      $_SESSION["result"]=0;
    }
    elseif($_SESSION["language"]==="Dutch")
    {
      if($translation===$words[$_SESSION["word"]])
      {
        echo nl2br("        That is correct! Good job! \n");
        $_SESSION["good"]++;
        $word = $_SESSION["word"];
        $_SESSION["words"] = array_diff($words,array("$word"=>"$translation"));
        unset($_SESSION["translation"]);
        unset($_SESSION["word"]);
        $_SESSION["result"]=0;
      }
      else
      {
        echo nl2br("        That is incorrect! Try again! \n");
        if(isset($_POST["check"]))
        {
          $_SESSION["wrong"]++;
        }
      }
    }
    else
    {
      $answer=$words[$translation];
      if($answer===$_SESSION["word"])
      {
        echo nl2br("        That is correct! Good job! \n");
        $_SESSION["good"]++;
        $word = $_SESSION["word"];
        $_SESSION["words"] = array_diff($words,array("$translation"=>"$word"));
        unset($_SESSION["translation"]);
        unset($_SESSION["word"]);
        $_SESSION["result"]=0;
      }
      else
      {
        echo nl2br("        That is incorrect! Try again! \n");
        if(isset($_POST["check"]))
        {
          $_SESSION["wrong"]++;
        }
      }
    }
  }
?>
        <hr />
<?php
  if($_SESSION["good"]>0 or $_SESSION["wrong"]>0)
  {
    $good = $_SESSION["good"];
    $wrong = $_SESSION["wrong"];
    $grade = $good / ($good+$wrong) * 9 + $_SESSION["bonus"];
    if($_SESSION["done"]==1){echo nl2br("        You have learned all words! Congratulations! \n");}
    echo nl2br("        Good: $good \n");
    echo nl2br("        Wrong: $wrong \n");
    echo nl2br("        Grade: ".round($grade,1)." \n");
    if($good==10){$_SESSION["done"]= 1;}
  }
?>
      </div>
      <div data-role="footer" data-position="fixed">
        <h3>&copy; Manoah T</h3>
      </div>
    </div>
  </body>
</html>