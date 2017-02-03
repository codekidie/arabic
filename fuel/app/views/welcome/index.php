<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SALMONAN ARABIC ISLAMIC INSTITUTE WEB-APPLICATION</title>
	<?php echo Asset::css(array('vendors/bootstrap/dist/css/bootstrap.min.css','vendors/font-awesome/css/font-awesome.min.css','vendors/nprogress/nprogress.css','vendors/animate.css/animate.min.css','build/css/custom.min.css','toastr.min.css')); ?>

</head>
 <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" password="password" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" name="login" value="Log in">
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-ra"></i> SALMONAN ARABIC ISLAMIC INSTITUTE WEB-APPLICATION
</h1>
                  <p>©2017 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="">
              <h1>Create Account</h1>
                <div>
                <input type="text" name="fullname" class="form-control" placeholder="Fullname" required="" />
              </div>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" name="register" class="btn btn-default submit" value="Submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-ra"></i> SALMONAN ARABIC ISLAMIC INSTITUTE
WEB-APPLICATION
</h1>
                  <p>©2017 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
   <?php echo Asset::js(array(
    'vendors/jquery/dist/jquery.min.js','modernizr.js','toastr.min.js','datatables/jquery.dataTables.js','datatables/dataTables.bootstrap.js'
  )); ?>
  <script>
          $('#guest_searchTbl').dataTable();  
  </script>
   <?php if (Session::get_flash('success')): ?>
          <script>            
          <?php 
            $msg  = 'toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-left",
                    "closeButton": true,
                    "showDuration": "1800",
                    "hideDuration": "2000",
                    "toastClass": "animated fadeInDown",
                };
               toastr.success("'.implode('</p><p>', (array) Session::get_flash('success')).'");';
            echo $msg;
           ?>
           </script>
    
        <?php endif; ?>
            <script>
          <?php if (Session::get_flash('error')): ?>
                 <?php 
              $msg  = 'toastr.options = {
                      "debug": false,
                      "newestOnTop": false,
                      "positionClass": "toast-top-left",
                      "closeButton": true,
                      "showDuration": "1800",
                      "hideDuration": "2000",
                      "toastClass": "animated fadeInDown",
                  };
                 toastr.error("'.implode('</p><p>', (array) Session::get_flash('error')).'");';
                  echo $msg;
             ?>
             </script>
        <?php endif; ?>
</html>
