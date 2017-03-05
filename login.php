<?php session_start(); 
ob_start();
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
  <body style="background: #fff !important">
    <?php 
      require_once("rb.php"); 
      require_once("con.php");

      if (isset($_POST['submit'])) {
         $username = $_POST['username'];
         $password = $_POST['password'];
         $users =  R::getAll('SELECT * FROM users WHERE username =:username AND password =:password Limit 1',[':username'=>$username,':password'=>sha1($password)]);
         if (empty($users)) {
           $_SESSION['login_prompt'] = "Username and password mismatch!";
         }else{
           // User is found
          foreach ($users as $u) {
            $_SESSION['username'] =  $u['username'];
            $_SESSION['role']     =  $u['role'];
          }
          header('Location: index.php');
           exit();
         }
      }

    ?>

      <div class="container">
      <div class="col-md-6">
        <center><h2 class="form-signin-heading">Salmonan</h2>
                <p>Arabic Islamic Institute</p>
        </center>

      <img src="assets/img/1714.jpg">
            
      </div>
      <div class="col-md-6">

      <form class="form-signin" action="" method="POST" style="border: 1px solid #000;border-radius: 5px;margin-top:90px;">
        <center>
         <?php if (!empty($_SESSION['login_prompt'])): ?>
                  <p style="color:red"><?php echo $_SESSION['login_prompt']; ?></p>

         <?php endif ?>
        </center>
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        <label style="margin-top:10px; ">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
    
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      </form>
      </div>

    </div> <!-- /container -->

