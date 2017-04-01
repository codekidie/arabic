<?php
session_start(); 
require("layouts/rb.php");
require("layouts/con.php");

$_SESSION['prompt'] = "The file has been uploaded.";
 $tutorials = R::dispense( 'tutorials' );
 $tutorials->content =  $_POST['content'];
 $tutorials->link = $_POST['link'];
 $id = R::store($tutorials);
header('Location:index.php');
exit();

  