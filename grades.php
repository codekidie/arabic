<?php
    require_once("layouts/header.php"); 
    require_once("layouts/slider.php");    

	


	if (isset($_POST['submit'])) {
				 $grades = R::dispense( 'grades' );
			     $grades->student_name =  $_POST['student_fullname'];
			     $grades->activity_code = $_POST['activity_code'];
			     $grades->type =  $_POST['type'];
			     $grades->grade = $_POST['grade'];
				 $id =   $_SESSION['id'];
			     $grades->faculty_id = $id;
			     $id = R::store($grades);
			     if ($id) {
			     	$_SESSION['prompt'] = '<div class="alert alert-success">
						  <strong>Grades!</strong> saved successful.
						</div>';
						$users =  R::getAll('SELECT * FROM users where role = :role ' ,array(':role'=>'student'));
						$id =   $_SESSION['id'];
						$grades =  R::getAll('SELECT * FROM grades where faculty_id = :faculty_id ' ,array(':faculty_id'=>$id));
			     }else{
			     	$_SESSION['prompt'] = '<div class="alert alert-danger">
									  <strong>Grades</strong> Not Saved.
									</div>';
					$users =  R::getAll('SELECT * FROM users where role = :role ' ,array(':role'=>'student'));
					$id =   $_SESSION['id'];
						$grades =  R::getAll('SELECT * FROM grades where faculty_id = :faculty_id ' ,array(':faculty_id'=>$id));				
			     }
	}else{
		$users =  R::getAll('SELECT * FROM users where role = :role ' ,array(':role'=>'student'));
		$id =   $_SESSION['id'];
		$grades =  R::getAll('SELECT * FROM grades where faculty_id = :faculty_id ' ,array(':faculty_id'=>$id));
	}
?>
  <div class="container">
		  <div class="row">
		   <?php if (!empty($_SESSION['prompt'])): ?>
                  <p style="color:red"><?php echo $_SESSION['prompt']; ?></p>
                  <?php $_SESSION['prompt'] = ""; ?>
         <?php endif ?>
		  	<div class="col-md-4">
					<form method="POST" action="">
				 		 <div class="form-group">
				   			<label for="pwd">Student Name:</label>
				    		<select name="student_fullname">
				    				<?php foreach ($users as $u): ?>
				    			    <option><?php echo $u['firstname']." ".$u['middlename']." ".$u['lastname'];?></option>  
				    				<?php endforeach ?>
				    		</select>
				 		 </div>
				 		 <div class="form-group">
				   			<label for="pwd">Activity Code:</label>
				    		<input type="text" name="activity_code" class="form-control" id="pwd">
				 		 </div>

				 		 <div class="form-group">
				   			<label for="pwd">Type :</label>
				    		<select name="type">
					    			<option>Quiz</option>
					                <option>Assignment</option>
					                <option>Exam</option>
				    		</select>
				 		 </div>
				 		 
				 		 <div class="form-group">
				   			<label>Grade :</label>
				    		<input type="text" name="grade" class="form-control">
				 		 </div>
				  			<button type="submit" name="submit" class="btn btn-default">Submit</button>
					</form>  		
		  	</div>
		  	<div class="col-md-8">
		  	<div id="grade_wrapper">
			  	<table class="table" id="tb0">
			  		<thead>
			  			<tr><th>Student Name</th>
			  			<th>Activity Code</th>
			  			<th>Type</th>
			  			<th>Grade</th>
			  			<th></th></tr>
			  		</thead>
			  		<tbody>
			  		<?php foreach ($grades as $g): ?>
			  			<tr><td><?php echo $g['student_name'] ?></td><td><?php echo $g['activity_code'] ?></td><td><?php echo $g['type'] ?></td><td><?php echo $g['grade'] ?></td><td><button class="btn btn-sm btn-danger" onclick="deleteGrade(<?php echo $g['id']; ?>)">delete</button></td></tr>
			  		<?php endforeach ?>
			  		</tbody>
			  	</table>
			  </div>	
		  	</div>
		  </div>
  </div>
  <br>
 <div class="container">
<?php 
require_once("layouts/footer.php");    
?>