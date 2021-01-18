<?php
  session_start();
  if (isset($_POST["play"]))
  {
    unset($_SESSION["s1"]);
    $_SESSION["end"] = 0;
    $_SESSION["dice"] = "";
    
    $_SESSION["name1"] = $_POST["name1"];
    $name1 = $_SESSION["name1"];
    $_SESSION["color1"] = $_POST["color1"];
    $color1 = $_SESSION["color1"];
    $_SESSION["name2"] = $_POST["name2"];    
    $name2 = $_SESSION["name2"];
    $_SESSION["color2"] = $_POST["color2"];
    $color2 = $_SESSION["color2"];
    $_SESSION["turn"] = $_POST["turn"];
    $turn = $_SESSION["turn"];
  }
  else
  {
    $name1 = $_SESSION["name1"];
    $color1 = $_SESSION["color1"];
    $name2 = $_SESSION["name2"];
    $color2 = $_SESSION["color2"];
    $turn = $_SESSION["turn"];
  }    	
  if (isset($_POST["reset"]))
  {
    $_SESSION["s1"] = 1;
    $_SESSION["s2"] = 1;
    $_SESSION["end"] = 0;
    $_SESSION["dice"] = "";
  }
  if (!isset($_SESSION["s1"]))
  {
    $_SESSION["s1"] = 1;
    $_SESSION["s2"] = 1;
  }
  if (!isset($_SESSION["turn"]))
  {
    $_SESSION["turn"] = $turn;
    $_SESSION["end"] = 0;
    $_SESSION["dice"] = "";
  }
  $player = $_POST["player"];
  if ($player == 1)
  {
    $throw = rand(1,6);
    $_SESSION["s1"] = $_SESSION["s1"] + $throw;
    $_SESSION["turn"] = 2;
    if ($_SESSION["s1"] > 21)
    {
      $_SESSION["s1"] = 21 - ($_SESSION["s1"]-21);
    }
    if ($_SESSION["s1"] == 21)
    {
      $_SESSION["end"] = 1;
    }
  }
  if ($player == 2)
  {
    $throw = rand(1,6);
    $_SESSION["s2"] = $_SESSION["s2"] + $throw;
    $_SESSION["turn"] = 1;
    if ($_SESSION["s2"] > 21)
    {
      $_SESSION["s2"] = 21 - ($_SESSION["s2"]-21);
    }
    if ($_SESSION["s2"] == 21)
    {
      $_SESSION["end"] = 1;
    }
  }
  if ($throw == 1){$_SESSION["dice"] = '/images/dice/dice1.gif';}
  if ($throw == 2){$_SESSION["dice"] = '/images/dice/dice2.gif';}
  if ($throw == 3){$_SESSION["dice"] = '/images/dice/dice3.gif';}
  if ($throw == 4){$_SESSION["dice"] = '/images/dice/dice4.gif';}
  if ($throw == 5){$_SESSION["dice"] = '/images/dice/dice5.gif';}
  if ($throw == 6){$_SESSION["dice"] = '/images/dice/dice6.gif';}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Board game - 149895.csgja.com</title>
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
      <a href="setup" target="_self" class="ui-btn ui-corner-all ui-icon-arrow-l ui-btn-icon-notext"></a>
        <div style="margin:.6em 0;">Board game</div>
      </div>
      <div role="main" class="ui-content" style="padding:0px;">
        <div class="ui-grid-c">
          <div class="ui-block-a">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;background-position: center;background-image: url('/images/webapps/start.png');background-color: green;">
                  <?php 
                    if($_SESSION["s1"]==1){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==1){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>
                </div>
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==2){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==2){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-b">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==3){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==3){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==4){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==4){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-c">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==5){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==5){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==6){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==6){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-d">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==7){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==7){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==8){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==8){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-a">
            <div class="ui-grid-a">
              <div class="ui-block-a"></div>
              <div class="ui-block-b"></div>
            </div>
          </div>
          <div class="ui-block-b">
            <div class="ui-grid-a">
              <div class="ui-block-a"></div>
              <div class="ui-block-b"></div>
            </div>
          </div>
          <div class="ui-block-c">
            <div class="ui-grid-a">
              <div class="ui-block-a"></div>
              <div class="ui-block-b"></div>
            </div>
          </div>
          <div class="ui-block-d">
            <div class="ui-grid-a">
              <div class="ui-block-a"></div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==9){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==9){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-a">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;background-size: 100% 100%;background-image: url('/images/webapps/finish.png')">
                  <?php 
                    if($_SESSION["s1"]==21){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==21){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==20){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==20){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-b">
            <div class="ui-grid-a">
              <div class="ui-block-a"></div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==16){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==16){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-c">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==15){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==15){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==14){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==14){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-d">
            <div class="ui-grid-a">
              <div class="ui-block-a"></div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==10){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==10){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-a">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <img src="<?php echo $_SESSION["dice"];?>" style="max-width:64%;margin-left:15%;margin-top:5px;<?php if($_SESSION["end"]==1){echo"display:none;";}?>" />
                <img src='/images/games/winner.png' style="max-width:80%;margin-left:15%;margin-top:5px;display:<?php if($_SESSION["end"]==1){echo "block;";}else{echo"none;";}?>" />
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==19){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==19){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-b">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==18){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==18){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==17){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==17){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-c">
            <div class="ui-grid-a">
              <div class="ui-block-a"></div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==13){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==13){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
          <div class="ui-block-d">
            <div class="ui-grid-a">
              <div class="ui-block-a">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==12){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==12){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
              <div class="ui-block-b">
                <div style="height: 8vw;background-color:#ffffff;background-size:cover;margin:1px;padding:1px;">
                  <?php 
                    if($_SESSION["s1"]==11){echo"<img src='/images/pawns/pawn-$color1.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";}
                    if($_SESSION["s2"]==11){echo"<img src='/images/pawns/pawn-$color2.png' style='max-width:50%;margin-top: 0;margin-left: auto;margin-right: auto;' />";} 
                  ?>							
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ui-grid-b">
          <div class="ui-block-a">
            <form method="post" id="form1">
              <input type="hidden" name="player" value="1" />
              <button  class="ui-btn ui-corner-all ui-mini" style="background-color:<?php echo"$color1";?>;" type="submit" <?php if($_SESSION["turn"]==2 or $_SESSION["end"]==1){echo"disabled='disabled'";} ?>><?php echo ucfirst("$name1");?></button>
            </form>
          </div>
          <div class="ui-block-b">
            <form method="post" id="form2">
              <input type="hidden" name="player" value="2" />
              <button  class="ui-btn ui-corner-all ui-mini" style="background-color:<?php echo"$color2";?>;" type="submit" <?php if($_SESSION["turn"]==1 or $_SESSION["end"]==1){echo"disabled='disabled'";} ?>><?php echo ucfirst("$name2");?></button>
            </form>
          </div>
          <div class="ui-block-c">
            <form method="post" id="form3">
              <button  class="ui-btn ui-corner-all ui-mini" name="reset" type="submit">Reset</button>
            </form>
          </div>
        </div>
      </div>
      <?php 
        if($_SESSION["turn"]==1 and $_SESSION["end"]==1)
        {
          echo ucfirst("$name2 wins!");
        }
        if($_SESSION["turn"]==2 and $_SESSION["end"]==1)
        {
          echo ucfirst("$name1 wins!");
        }
      ?>
      <div data-role="footer" data-position="fixed">
        <h3>&copy; Manoah T</h3>
      </div>
    </div>
  </body>
</html>