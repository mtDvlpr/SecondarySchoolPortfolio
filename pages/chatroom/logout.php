<?php
session_start();
include("config.php");
$sql=$dbh->prepare("DELETE FROM chatters WHERE name=?");
$sql->execute(array($_SESSION['user']));
unset($_SESSION['user']);
header("Location: index.php");
?>
