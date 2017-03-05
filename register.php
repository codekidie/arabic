<?php session_start(); ?>
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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body id="register_body">
    <?php 
      include("rb.php"); 
      require_once("con.php");
    ?>
   

      <div class="container">

      <form class="form-signin" action="" method="POST">
          <?php if (!empty($_SESSION['prompt_login'])): ?>
                  <?php 
                      echo $_SESSION['prompt_login']; 
                       $_SESSION['prompt_login'] = ""; 
                  ?>
          <?php endif ?>
        <h2 class="form-signin-heading">Register</h2>

        <label for="inputEmail" >First Name</label>
        <input type="text" name="firstname" class="form-control" placeholder="Firstname" required autofocus>

        <label for="inputEmail" >Middle Name</label>
        <input type="text" name="middlename" class="form-control" placeholder="Firstname" required autofocus>

        <label for="inputEmail" >Last Name</label>
        <input type="text" name="lastname" class="form-control" placeholder="Firstname" required autofocus>

        <label for="inputEmail" >Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputEmail" >Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>

        <label for="inputPassword">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
     
        <label for="inputPassword">Role</label>
        <select name="role" class="form-control" required style="height:40px;margin-bottom:20px;">
            <option value="student">Student</option>  
            <option value="admin">Admin</option>  
            <option value="faculty">Faculty</option>  
        </select>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
        <a href="login.php" class="btn btn-lg btn-primary btn-block">Already Got Account</a>
      </form>

    </div> <!-- /container -->

