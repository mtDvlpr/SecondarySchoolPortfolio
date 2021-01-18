<?php include("config.php");include("login.php");include "../../mysql-php/chatroom.php";?>
<!DOCTYPE html>
<html>
  <head>
    <title>Chatroom test</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Manoah T"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logos/favicon.ico">

    <!-- CSS -->
    <link href="chat.css" rel="stylesheet"/>
    
    <!-- JS & jQuery -->
    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="chat.js"></script>
  </head>
  <body>
    <div id="content" style="margin-top:10px;height:100%;">
      <center><h1>Group Chat</h1></center>
      <div class="chat">
        <div class="users">
          <?php include("users.php");?>
        </div>
        <div class="chatbox">
          <?php
            if(isset($_SESSION['user']))
            {
              include("chatbox.php");
            }
            else
            {
              $display_case=true;
              include("login.php");
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>