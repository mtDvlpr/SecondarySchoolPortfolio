<?php
include("config.php");
if(isset($_SESSION['user'])){
?>
 <h2>Chatroom</h2>
 <a style="right: 20px;top: 20px;position: absolute;cursor: pointer;text-decoration:none;color:red;" href="logout.php">Log Out</a>
 <div class='msgs'>
  <?php include("msgs.php");?>
 </div>
 <form id="msg_form">
  <input name="msg" size="30" type="text" style="display: inline-block;"/>
  <button style="display:inline-block;float:right;">Send</button>
 </form>
<?php 
}
?>