<?php 
session_start(); 
require("rb.php");
require("con.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Salmonan</title>
    <!-- Bootstrap core CSS -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-confirm.min.css">


    
    
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
<?php 
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}
?>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">SALMONAN</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="<?php active('index.php');?>"><a href="index.php">Home</a></li>
                <li class="<?php active('translator.php');?>"><a href="translator.php">Translator</a></li>
                <li class="<?php active('madrasah.php');?>"><a href="madrasah.php">Madrasah</a></li>
                <li class="<?php active('contact.php');?>"><a href="contact.php">Contact</a></li>
               <?php if (!empty($_SESSION['role']) && $_SESSION['role'] == 'admin' ): ?>
                <li class="<?php active('settings.php');?>"><a href="settings.php">Settings</a></li>
                <?php elseif(empty($_SESSION['role'])): ?>
                <li><a href="login.php">Login</a></li>
               <?php endif ?>

              </ul>
              <?php if (!empty($_SESSION['role'])): ?>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><b> <?php echo  $_SESSION['username']; ?></b> <span class="caret"></span></a>
                <ul id="login-dp" class="dropdown-menu">
                <li>
                   <div class="row">
                      <div class="col-md-12">
                        <!-- Login -->
                        <div class="social-buttons">
                            <div class="iconSpecial" style="padding:10px;"><i class="glyphicon glyphicon-off"></i><a href="logout.php"> logout</a></div>
                        </div>                               
                      </div>            
                       </div>
                    </li>
                  </ul>
                </li>
              </ul>
              <?php endif ?>

            </div>
          </div>
        </nav>

      </div>
    </div>