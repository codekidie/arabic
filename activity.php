<?php
    require_once("layouts/header.php"); 
    require_once("layouts/slider.php");    
    
?>
<div class="col-md-12">
	<div class="container">
<?php if (isset($_SESSION['role']) && $_SESSION['role'] != 'student' ): ?>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalActivity">
	  Add new Activity
	</button>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-md" id="addnewQuestion" data-toggle="modal" data-target="#modalQuestionaires">
	  Add new Question
	</button>
<?php endif ?>
	<input type="hidden" id="subject_active_id" value="<?php echo $_GET['activity_subject_id']; ?>">
	<hr>
			<div id="activity_wrapper"></div>
	</div>
</div>  
<?php 
    require_once("layouts/footer.php");    
?>