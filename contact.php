<?php 
    require_once("layouts/header.php");   
    include("rb.php"); 
    require_once("con.php");


    if (isset($_POST['submit'])) {
         $contact = R::dispense( 'contact' );
         $contact->name     = $_POST['name'];
         $contact->email    = $_POST['email'];
         $contact->mobile   = $_POST['mobile'];
         $contact->email    = $_POST['email'];
         $contact->subject  = $_POST['subject'];
         $contact->message  = $_POST['message'];
         $id = R::store( $contact );
         if ($id) {
           $_SESSION['prompt_contact'] = " Sent Success!";
         }else{
           $_SESSION['prompt_contact'] = "Something Went Wrong Please Try Again!";

         }
    }
?>


<div class="container" style="margin-top: 30px;">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form" method="POST" action="">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
                      <?php if (!empty($_SESSION['prompt_contact'])): ?>
			                  <?php 
			                      echo $_SESSION['prompt_contact']; 
			                       $_SESSION['prompt_contact'] = ""; 
			                  ?>
			          <?php endif ?>
    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                    </div>
            
        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
        </form>
    </div>
</div>
<div class="col-md-7">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15837.615315938925!2d125.55746537441485!3d7.079093068198071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f96d3302d08f9b%3A0x4ba45170cd8583cf!2sMatina+Pangi%2C+Talomo%2C+Dabaw%2C+Lalawigan+ng+Davao+del+Sur!5e0!3m2!1sfil!2sph!4v1488515602065" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</div>

<?php 
    require_once("layouts/footer.php");    
?>