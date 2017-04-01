<?php 
session_start();
include("layouts/rb.php"); 
require_once("layouts/con.php");



function getallUsers()
{
	$users =  R::getAll('SELECT * FROM users');
				                        		
	$content = '<table class="table" id="tb1">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Role</th>
						<th>Actions</th>
					</tr>
				</thead><tbody>';
		foreach ($users as $u)
		{
			$content .= '
					<tr>
						<td>'.$u['firstname'].'</td>
						<td>'.$u['middlename'].'</td>
						<td>'.$u['lastname'].'</td>
						<td>'.$u['username'].'</td>
						<td>'.$u['email'].'</td>
						<td>'.$u['role'].'</td>
						<td><button class="btn btn-info btn-sm btn-block" onclick="editstudent('.$u['id'].')">Edit</button>
							 <button class="btn btn-danger btn-sm btn-block" onclick="deleteuser('.$u['id'].')">Delete</button></td>
					</tr>';
		}
			$content .= '</tbody></table>';

			echo $content;
}

if (isset($_GET['studentid'])) {

	$studentid =  $_GET['studentid'];
	$students = R::load( 'users', $studentid );


	$content = '<form action="" method="POST">  
			    <input type="hidden" name="id" value="'.$students->id.'" id="studentid">

			    <label for="inputEmail" >First Name</label>
			    <input type="text" name="firstname" class="form-control" id="firstname" value="'.$students->firstname.'" placeholder="Firstname" required autofocus>

			    <label for="inputEmail" >Middle Name</label>
			    <input type="text" name="middlename" class="form-control" id="middlename" value="'.$students->middlename.'" placeholder="Middle Name" required autofocus>

			    <label for="inputEmail" >Last Name</label>
			    <input type="text" name="lastname" class="form-control" id="lastname" value="'.$students->lastname.'" placeholder="Last Name" required autofocus>

			    <label for="inputEmail" >Email address</label>
			    <input type="email" name="email" class="form-control" id="email" value="'.$students->email.'" placeholder="Email address" required autofocus>

			    <label for="inputEmail" >Username</label>
			    <input type="text" name="username" class="form-control" id="username" value="'.$students->username.'" placeholder="Username" required autofocus>

			    <label for="inputPassword">Password</label>
			    <input type="password" name="password" class="form-control" id="password" value="" placeholder="Password" required>
			 
			    <label for="inputPassword">Role</label>

			    <select name="role" class="form-control" required style="height:40px;margin-bottom:20px;" id="role">';
			    if ($students->role == 'student') {
			    	$content .=  '<option value="student" selected>Student</option>  
			        <option value="admin">Admin</option>  
			        <option value="faculty">Faculty</option>';
			    }
			    else if($students->role == 'admin')
			    {
			    	$content .= '<option value="student">Student</option>  
			        <option value="admin" selected>Admin</option>  
			        <option value="faculty">Faculty</option>';
			    }
			    else if($students->role == 'faculty')
			    {
			    	$content .= '<option value="student">Student</option>  
			        <option value="admin">Admin</option>  
			        <option value="faculty" selected>Faculty</option>';
			    }else{
			    	$content .= '<option value="student">Student</option>  
			        <option value="admin">Admin</option>  
			        <option value="faculty">Faculty</option>';
			    }
			          
			        $content .='</select>';
	echo $content;		    
		
}



if (isset($_GET['save_userid'])) {
	$save_userid =  $_GET['save_userid'];
	$students = R::load( 'users', $save_userid );	
	$students->firstname = $_GET['firstname'];
	$students->middlename = $_GET['middlename'];
	$students->lastname = $_GET['lastname'];
	$students->username = $_GET['username'];
	$students->password = sha1($_GET['password']);
	$students->role = $_GET['role'];
	$saved = R::store($students);
	if ($saved) {
		getallUsers();
	}
}


if (isset($_GET['delete_userid'])) {
	$delete_userid =  $_GET['delete_userid'];
	$user   = R::load( 'users', $delete_userid);
	R::trash( $user);
	getallUsers();
	
}


if (isset($_GET['eventid'])) {

	$eventid =  $_GET['eventid'];
	$event   = R::load( 'events', $eventid);
	$content = '<form action="" method="POST">  
			    <input type="hidden" name="id" value="'.$event->id.'" id="eventid">

			    <label>Date</label>
		        <input type="date" name="date" class="form-control" value="'.$event->date_occure.'" id="date_occure" required autofocus>

		        <label>Event Type </label>
		        <input type="text" name="event_type" class="form-control" value="'.$event->event_type.'" id="event_type" required autofocus>

		        <label>Description</label>
		        <textarea name="description" class="form-control" id="description">'.$event->description.'</textarea>';

	echo $content;		    
		
}



if (isset($_GET['save_eventid'])) {
	$save_eventid =  $_GET['save_eventid'];
	$events = R::load( 'events', $save_eventid );	
	$events->date_occure = $_GET['date_occure'];
	$events->event_type =  $_GET['event_type'];
	$events->description = $_GET['description'];
	$saved = R::store($events);
	if ($saved) {
		$users =  R::getAll('SELECT * FROM events');
		$content = '<table class="table" id="tb2">
					<thead>
						<tr>
							<th>Date</th>
							<th>Event Type</th>
							<th>Description</th>';
						if ($_SESSION['role'] != 'student' ) {

							$content .= '<th>Actions</th>';
						}	
						$content .= '</tr>
					</thead>';
			foreach ($users as $u)
			{
				$content .= '<tbody>
						<tr>
							<td>'.$u['date_occure'].'</td>
							<td>'.$u['event_type'].'</td>
							<td>'.$u['description'].'</td>';
						if ($_SESSION['role'] != 'student' ) {

							$content .= '<td>
							<button class="btn btn-info btn-sm btn-block" onclick="editevent('.$u['id'].')">Edit</button>
							<button class="btn btn-danger btn-sm btn-block" onclick="deleteevent('.$u['id'].')">Delete</button></td>';
						}	
						$content .= '</tr>
					</tbody>';
			}
		
		$content .= '</table>';
		echo $content;
	}
}


if (isset($_GET['delete_eventid'])) {
	$eventid =  $_GET['delete_eventid'];
	$event   = R::load( 'events', $eventid);
	R::trash( $event);
	$users =  R::getAll('SELECT * FROM events');
		$content = '<table class="table" id="tb2">
					<thead>
						<tr>
							<th>Date</th>
							<th>Event Type</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>
					</thead>';
			foreach ($users as $u)
			{
				$content .= '<tbody>
						<tr>
							<td>'.$u['date_occure'].'</td>
							<td>'.$u['event_type'].'</td>
							<td>'.$u['description'].'</td>
							<td>
							<button class="btn btn-info btn-sm btn-block" onclick="editevent('.$u['id'].')">Edit</button>
							<button class="btn btn-danger btn-sm btn-block" onclick="deleteevent('.$u['id'].')">Delete</button></td>
						</tr>
					</tbody>';
			}
		
		$content .= '</table>';
		echo $content;
}

// Start Subject Codes
// Admin Area

function getSubjects(){
	$id = $_SESSION['id'];
	$users =  R::getAll('SELECT * FROM subjects');
		$content = '<table class="table" id="tb0">
					<thead>
						<tr>
							<th>Name</th>
							<th>Code</th>
							<th>Description</th>
							<th>Student</th>
							<th>Faculty</th>';
						if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
							$content .= '<th>Actions</th>';
						}
						$content .= '</tr>
					</thead><tbody>';
			foreach ($users as $u)
			{
				$student = R::load( 'users',$u['student_id']);
				$faculty = R::load( 'users',$u['faculty_id']);
				$content .= '
						<tr>
							<td>'.$u['subname'].'</td>
							<td>'.$u['subject_code'].'</td>
							<td>'.$u['subdescription'].'</td>
							<td>'.$student->firstname." ".$student->middlename." ".$student->lastname.'</td>
							<td>'.$faculty->firstname." ".$student->middlename." ".$student->lastname.'</td>';
						if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {

							$content .= '
							<td>
							<button class="btn btn-info btn-sm btn-block" onclick="editsubject('.$u['id'].')">Edit</button>
							<button class="btn btn-danger btn-sm btn-block" onclick="deletesubject('.$u['id'].')">Delete</button></td>';
						}	
						$content .= '</tr>
				';
			}
		
		$content .= '</tbody></table>';
		echo $content;
}

function getSubjectsStudent(){
	$id = $_SESSION['id'];
	$users =  R::getAll('SELECT * FROM subjects where student_id = :student_id ' ,array(':student_id'=>$id));
		$content = '<table class="table" id="tb0">
					<thead>
						<tr>
							<th>Name</th>
							<th>Code</th>
							<th>Description</th>
							<th>Student</th>
							<th>Faculty</th>
							<th>Actions</th>';
						$content .= '</tr>
					</thead><tbody>';
			foreach ($users as $u)
			{
				$student = R::load( 'users',$u['student_id']);
				$faculty = R::load( 'users',$u['faculty_id']);
				$content .= '
						<tr>
							<td>'.$u['subname'].'</td>
							<td>'.$u['subject_code'].'</td>
							<td>'.$u['subdescription'].'</td>
							<td>'.$student->firstname." ".$student->middlename." ".$student->lastname.'</td>
							<td>'.$faculty->firstname." ".$student->middlename." ".$student->lastname.'</td>';
				

							$content .= '
							<td>
							<a class="btn btn-info btn-sm btn-block" href="activity.php?activity_subject_id='.$u['id'].'">Activity</a>
							';
						$content .= '</tr>
					';
			}
		
		$content .= '</tbody></table>';
		echo $content;
}


function getFacultySubjects()
{
		$id = $_SESSION['id'];
        $users = R::getAll('SELECT * FROM subjects where faculty_id = :faculty_id' ,array(':faculty_id'=>$id));
		$content = '<table class="table" id="tb0">
					<thead>
						<tr>
							<th>Name</th>
							<th>Code</th>
							<th>Description</th>';
						if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
							$content .= '<th>Actions</th>';
						}
						$content .= '</tr>
					</thead><tbody>';
			foreach ($users as $u)
			{
				$student = R::load( 'users',$u['student_id']);
				$faculty = R::load( 'users',$u['faculty_id']);
				$content .= '
						<tr>
							<td>'.$u['subname'].'</td>
							<td>'.$u['subject_code'].'</td>
							<td>'.$u['subdescription'].'</td>';
						if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
							$content .= '<td>
							<a class="btn btn-info btn-sm btn-block" href="activity.php?activity_subject_id='.$u['id'].'">Activity</a>
							<a class="btn btn-info btn-sm btn-block" href="grades.php">Grades</a>
											<button class="btn btn-info btn-sm btn-block" onclick="editsubject('.$u['id'].')">Edit</button>
											<button class="btn btn-danger btn-sm btn-block" onclick="deletesubject('.$u['id'].')">Delete</button>
										</td>';
						}	
						
						$content .= '</tr>
					';
			}
		
		$content .= '</tbody></table>';
		echo $content;
}



if (isset($_GET['subject_student_id']) &&  $_GET['subject_student_id'] != 0) {
	 $subjects = R::dispense( 'subjects' );
     $subjects->student_id =  $_GET['subject_student_id'];
     $subjects->faculty_id =  $_GET['subject_faculty_id'];
     $subjects->subdescription =  $_GET['subject_description'];
     $subjects->subname =  $_GET['subjectname'];
     $subjects->subject_code =  $_GET['subjectcode'];
     $id = R::store($subjects);
     if ($id) {
     	if (!empty($_SESSION['role']) &&  $_SESSION['role'] == 'faculty') {
     		getFacultySubjects();
     	}
     	else if (!empty($_SESSION['role']) &&  $_SESSION['role'] == 'student') {
     		getSubjectsStudent();
     	}
     	else  if (!empty($_SESSION['role']) &&  $_SESSION['role'] == 'admin'){
	     	getSubjects();
     	}
     }

}else if(isset($_GET['subject_student_id']) && $_GET['subject_student_id'] == 'none'){
     	if (!empty($_SESSION['role']) && $_SESSION['role'] == 'faculty') {
     		getFacultySubjects();
     	}
		else if (!empty($_SESSION['role']) &&  $_SESSION['role'] == 'student') {
     		getSubjectsStudent();
     	}
     	else if (!empty($_SESSION['role']) &&  $_SESSION['role'] == 'admin'){
	     	getSubjects();
     	}
}


if (isset($_GET['delete_subjectid'])) {
	$delete_subjectid =  $_GET['delete_subjectid'];
	$subjects         =  R::load( 'subjects', $delete_subjectid);
	R::trash($subjects);
    if (!empty($_SESSION['role']) &&  $_SESSION['role'] == 'faculty') {
 		getFacultySubjects();
 	}else{
     	getSubjects();
 	}

}

if (isset($_GET['subject_editid'])) {
	$subject_id =  $_GET['subject_editid'];
	$subject    = R::load( 'subjects', $subject_id);
	$content = '<form action="" method="POST">  
			    <input type="hidden" name="id" value="'.$subject->id.'" id="modalsubjectid">
	              <label>Subject Code</label>
	              <input type="text" name="subjectcode" id="modalsubjectcode" value="'.$subject->subject_code.'" class="form-control" required autofocus>

	              <label>Subject Name </label>
	              <input type="text" name="subjectname" id="modalsubjectname" value="'.$subject->subname.'" class="form-control" required autofocus>

	              <label>Subject Description</label>
	              <textarea name="description" id="modalsubject_description" class="form-control">'.$subject->subdescription.'</textarea>
	              ';
	                $studentdata = R::getAll('SELECT * FROM users where role = :role',array(':role'=>'student'));
	                $facultydata = R::getAll('SELECT * FROM users where role = :role',array(':role'=>'faculty'));
	              
	     $content .= '    <label>Student Name</label>
	              <select name="student_id" id="modalsubject_student_id" class="form-control">';
	                foreach ($studentdata as $sd){
	                	   if ($subject->student_id == $sd['id']) {
	                	   	  $selected = 'selected';
	                	   }else{
	                	   	  $selected = '';
	                	   }
	                       $content .= ' <option value="'.$sd['id'].'" '.$selected.'>'. $sd['firstname']." ".$sd['middlename']." ".$sd['lastname'].'</option>';
	                    }
	            $content .= '</select> ';
	            $content .= ' <label>Faculty Name</label>
	              <select name="faculty_id" id="modalsubject_faculty_id" class="form-control">';
	                foreach ($facultydata as $sd){
	                	if ($subject->faculty_id == $sd['id']) {
	                	   	  $selected = 'selected';
	                	   }else{
	                	   	  $selected = '';
	                	   }
	                	$content .=  '<option value="'.$sd['id'].'"'.$selected.'>'.$sd['firstname']." ".$sd['middlename']." ".$sd['lastname'].'</option>';	
	                }
	                       
	            $content .=  '</select>'; 

	echo $content;		    
		
}

if (isset($_GET['modalsubjectid'])) {
	 $subjectid =  $_GET['modalsubjectid'];
	 $subjects = R::load( 'subjects', $subjectid);	
	 $subjects->student_id =  $_GET['modalsubject_student_id'];
	 $subjects->faculty_id =  $_GET['modalsubject_faculty_id'];
	 $subjects->subdescription =  $_GET['modalsubject_description'];
	 $subjects->subname =  $_GET['modalsubjectname'];
	 $subjects->subject_code =  $_GET['modalsubjectcode'];
	$saved = R::store($subjects);
	if ($saved) {
			if (!empty($_SESSION['role']) &&  $_SESSION['role'] == 'faculty') {
 				getFacultySubjects();
		 	}else{
		     	getSubjects();
		 	}
	}
}



// Question Modal Form
function getFacultyActivity()
{
		$id = $_SESSION['id'];
		if (!empty($_GET['activity_subject_id'])) {
			$subject_id = $_GET['activity_subject_id'];
		}else{
			$subject_id = "";
		}
		

        $users = R::getAll('SELECT * FROM activity where faculty_id = :faculty_id and subject_id =:subject_id ',array(':faculty_id'=>$id,':subject_id'=>$subject_id));
		$content = '<table class="table" id="tb0">
					<thead>
						<tr>
							<th>Activity</th>
							<th>Activity Name</th>
							<th>Date Of Submittion</th>
							<th>Actions</th>';
						
						$content .= '</tr>
					</thead>';
					$content .= '<tfoot>
						<tr>
							<th>Activity</th>
							<th>Activity Name</th>
							<th>Date Of Submittion</th>
							<th>Actions</th>';
						
						$content .= '</tr>
					</tfoot><tbody>';
			foreach ($users as $u)
			{
				$content .= '<tr>
										<td>'.$u['activity_selected'].'</td>
										<td>'.$u['quiz_name'].'</td>
										<td>'.$u['quiz_date'].'</td>
										<td><button class="btn btn-info btn-sm btn-block" onclick="editactivity('.$u['id'].')">Edit</button><button class="btn btn-info btn-sm btn-block" onclick="viewactivity('.$u['id'].')">View Activity</button>
							<button class="btn btn-danger btn-sm btn-block" onclick="deleteactivity('.$u['id'].')">Delete</button></td>';
				$content .= '</tr>';
			}

			
		
		$content .= '</tbody></table>';
		echo $content;

}

function getStudentActivity()
{
		$subject_id = $_GET['activity_subject_id'];
		$id = $_SESSION['id'];
		$student = R::getAll('SELECT * FROM subjects where student_id = :student_id and id =:subject_id ' ,array(':student_id'=>$id,':subject_id'=>$subject_id));
		foreach ($student as $s) {
			$faculty_id = $s['faculty_id'];
		}

        $users = R::getAll('SELECT * FROM activity where subject_id =:subject_id and faculty_id =:faculty_id ' ,array(':subject_id'=>$subject_id,':faculty_id'=>$faculty_id));
		$content = '<table class="table" id="tb0">
					<thead>
						<tr>
							<th>Activity</th>
							<th>Activity Name</th>
							<th>Date Of Submittion</th><th>Actions</th>';
						
						$content .= '</tr>
					</thead><tbody>';
			foreach ($users as $u)
			{
				$content .= '<tr>
										<td>'.$u['activity_selected'].'</td>
										<td>'.$u['quiz_name'].'</td>
										<td>'.$u['quiz_date'].'</td>
										<td><button class="btn btn-info btn-sm btn-block" onclick="answeractivity('.$u['id'].')">Answer Activity</button></td>';
				$content .= '</tr>';
			}
		
		$content .= '</tbody></table>';
		echo $content;
}

if (isset($_GET['deleteactivity'])) {
	$activity   = R::load( 'activity', $_GET['deleteactivity']);
	R::trash( $activity);
	if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
		getFacultyActivity();
	}else{
		getStudentActivity();
	}
}

if (isset($_GET['addquestion'])) {
	 $subject_id =  $_GET['subject_id'];
	 $faculty_id =  $_SESSION['id'];
	 $activity_select =  $_GET['activity_select'];
	 $quiz_name =  $_GET['quiz_name'];
	 $quiz_date =  $_GET['quiz_date'];

	 $activity = R::dispense( 'activity' );
     $activity->subject_id =  $subject_id;
     $activity->activity_selected =  $activity_select;
     $activity->quiz_name =  $quiz_name;
     $activity->quiz_date =  $quiz_date;
     $activity->faculty_id = $faculty_id;
     $id = R::store($activity);
    if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
		getFacultyActivity();
	}else{
		getStudentActivity();
	}

}

if (isset($_GET['activity_subject_id'])) {
	if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
		getFacultyActivity();
	}else{
		getStudentActivity();
	}
}

if (isset($_GET['addnewselector'])) {
	 $subject_id =  $_GET['subject_id'];
	 $id =  $_SESSION['id'];

	 $activity = R::getAll('SELECT * FROM activity where faculty_id = :faculty_id and subject_id = :subject_id GROUP BY quiz_name' ,array(':faculty_id'=>$id,':subject_id'=>$subject_id));
	 $content ='';
	 foreach ($activity as $a) {
     $content .= '<input type="hidden" id="questionaire_activity_id"  value="'.$a['id'].'">';
 	 }

	 $content .= "<select id='activity_name'>";
	 foreach ($activity as $a) {
	 		$content .= "<option value='".$a['quiz_name']."'>".$a['quiz_name']."</option>";
	 }
	 $content .= "</select>";
    echo $content;
}


if (isset($_GET['submitquestion'])) {
	 $subject_id =  $_GET['subject_id'];
	 $faculty_id =  $_SESSION['id'];
	 $activity_name =  $_GET['activity_name'];
	 $activity_id =  $_GET['activity_id'];
	 $question =  $_GET['question'];
	 $correct =  $_GET['correct'];
	 $wrongone =  $_GET['wrongone'];
	 $wrongtwo =  $_GET['wrongtwo'];

	 $questions = R::dispense( 'questionaire' );
     $questions->subject_id =  $subject_id;
     $questions->quiz_name =  $activity_name;
     $questions->activity_id =  $activity_id;
     $questions->question =  $question;
     $questions->correct =  $correct;
     $questions->wrong = $wrongone;
     $questions->wrongtwo = $wrongtwo;
     $questions->faculty_id = $faculty_id;
     $id = R::store($questions);
     getFacultyActivity();
}


if (isset($_GET['editactivity_id'])) {
	$editactivity_id =  $_GET['editactivity_id'];
	$activity    =  R::getAll('SELECT * FROM activity where id = :id ',array(':id'=>$editactivity_id));
	$content = "";
	foreach ($activity as $a) {
		$content .=  '<div class="row" style="padding:10px;">
			              <label>Select Activity Type</label>
			              <select id="modal_activity_select" class="form-control">';
			            
			              if ($a['activity_selected']== "Quiz") {
			              	 $content .=  '	<option selected>Quiz</option>
				                <option>Assignment</option>
				                <option>Exam</option>';
			              }
			              
			              if ($a['activity_selected'] == "Assignment") {
			              	 $content .=  '	<option >Quiz</option>
				                <option selected>Assignment</option>
				                <option>Exam</option>';
			              }

			             if ($a['activity_selected'] == "Exam") {
			              	 $content .=  '	<option>Quiz</option>
				                <option>Assignment</option>
				                <option selected>Exam</option>';
			              }
			                
			             
			           $content .=  '   </select>

			          <br>
			          <label>Activity Name</label>
			          <input type="text" id="modal_quiz_name" class="form-control" value="'.$a['quiz_name'].'" placeholder="Input Activity Name"> 

			          <input type="hidden" id="modal_activity_id" class="form-control" value="'.$a['id'].'" > 

			           <br>
			          <label>Submittion Date</label>
			          <input type="date" id="modal_quiz_date" class="form-control" value="'.$a['quiz_date'].'" > 
			              
			         </div>';
	}
	   echo $content;  
 }

 if (isset($_GET['submit_edited_acitvity'])) {
	 $subject_id =  $_GET['subject_id'];
	 $activity_id =  $_GET['activity_id'];
	 $faculty_id =  $_SESSION['id'];
	 $activity_select =  $_GET['activity_select'];
	 $quiz_name =  $_GET['quiz_name'];
	 $quiz_date =  $_GET['quiz_date'];

	 $activity = R::load('activity', $activity_id);	
     $activity->subject_id =  $subject_id;
     $activity->activity_selected =  $activity_select;
     $activity->quiz_name =  $quiz_name;
     $activity->quiz_date =  $quiz_date;
     $activity->faculty_id = $faculty_id;
     $id = R::store($activity);

	getFacultyActivity();
 }


 function getQuestions()
 {
 		$id = $_SESSION['id'];
 		if (!empty($_GET['view_acitvity'])) {
 			$activity_id = $_GET['view_acitvity'];
 		}

 		if (!empty($_GET['view_acitvity_question_id'])) {
 			$activity_id = $_GET['view_acitvity_question_id'];
 		}

        $users = R::getAll('SELECT * FROM questionaire where faculty_id = :faculty_id and activity_id = :activity_id' ,array(':faculty_id'=>$id,':activity_id'=>$activity_id));
		$content = '<table class="table" id="tb0">
					<thead>
						<tr>
							<th>Activity Name</th>
							<th>Question</th>
							<th>correct</th>
							<th>wrong</th>
							<th>wrong</th>
							<th>Actions</th>';
						
						$content .= '</tr>
					</thead><tbody>';
			foreach ($users as $u)
			{
				$content .= '<tr>
										<td>'.$u['quiz_name'].'</td>
										<td>'.$u['question'].'</td>
										<td>'.$u['correct'].'</td>
										<td>'.$u['wrong'].'</td>
										<td>'.$u['wrongtwo'].'</td>
										<td>
							<button class="btn btn-danger btn-sm btn-block" onclick="deleteQuestion('.$u['id'].')">Delete</button></td>';
				$content .= '</tr>';
			}
		
		$content .= '</tbody></table>';
		echo $content;
 }


 if (isset($_GET['view_acitvity'])) {
 			getQuestions();
 }


 if (isset($_GET['deleteQuestion_id'])) {
 	$question   = R::load( 'questionaire', $_GET['deleteQuestion_id']);
	R::trash($question);
	getQuestions();
 }



// Student Answer Activity Modadl
 if (isset($_GET['answerStudentModal'])) {
 		$activity_id = $_GET['answerStudentModal'];

 		 $users = R::getAll('SELECT * FROM questionaire where activity_id =:activity_id' ,array(':activity_id'=>$activity_id));
		  $content =""; 
		  $counter = 0;
		  $quiz_name = "";
			foreach ($users as $u)
			{
				 $q = R::getAll('SELECT * FROM answers where student_id =:student_id and question_id =:question_id'  ,array(':student_id'=>$_SESSION['id'],':question_id'=>$u['id']));
				 if ($q) {
				 	getAnswers($u['id'],$_SESSION['id']);
				 	die();
				 }
				$counter++;
					$answers = array($u['correct'],$u['wrong'],$u['wrongtwo']);
					shuffle($answers);
					$quiz_name = $u['quiz_name'];
					$content .= '<fieldset class="form-group">
							    <legend>'.$u['quiz_name'].'</legend>
							    <div class="form-check">
							      <label class="form-check-label">
							        <input type="radio" class="form-check-input question'.$counter.'" name="question'.$counter.'" value="'.$answers[0].'">  '.$answers[0].'
							      </label>
							    </div>
							    <div class="form-check">
							    <label class="form-check-label">
							        <input type="radio" class="form-check-input question'.$counter.'" name="question'.$counter.'" value="'.$answers[1].'">
							         '.$answers[1].'
							      </label>
							    </div>
							    <div class="form-check">
							    <label class="form-check-label">
							        <input type="radio" class="form-check-input question'.$counter.'" name="question'.$counter.'" value="'.$answers[2].'">
							         '.$answers[2].'
							      </label>
							    </div>
							  </fieldset>';

					$content .= '<input type="hidden" id="question_id_'.$counter.'" value="'.$u['id'].'">';

			}
			$content .= '<input type="hidden" id="answer_quiz_name" value="'.$quiz_name.'">';
			$content .= '<input type="hidden" id="total_questions" value="'.$counter.'">';
			$content .= '<input type="hidden" id="answer_user_id" value="'.$_SESSION['id'].'">';
		
			echo $content;

 }


 // Submit answer Function


function getAnswers($question_id,$student_id)
{
	 $users = R::getAll('SELECT * FROM answers where question_id = :question_id and student_id = :student_id' ,array(':question_id'=>$question_id,':student_id'=>$student_id));



		$content = '<table class="table" id="tb0">
					<thead>
						<tr>
							<th>Question #</th>
							<th>Answer</th>
							<th>Result</th>';
						
						$content .= '</tr>
					</thead><tbody>';
					$counter = 1;
			foreach ($users as $u)
			{
		 		$q = R::getAll('SELECT correct FROM questionaire where id = :question_id ' ,array(':question_id'=>$u['question_id']));
		 		if ($q[0]['correct'] == $u['answer']) {
		 			$res = "Correct";
		 		}else{
		 			$res = "Wrong";
		 		}

				$content .= '<tr>
										<td>'.$counter++.'</td>
										<td>'.$u['answer'].'</td>
										<td class="has_answer">'.$res.'</td>';
				$content .= '</tr>';
			}
		
		$content .= '</tbody></table>';
		echo $content;
}

 if (isset($_GET['submit_answer'])) {
	 $submit_answer =  $_GET['submit_answer'];
	 $student_answer_id =  $_GET['student_answer_id'];
	 $submit_question_id =  $_GET['submit_question_id'];


	 $activity = R::dispense('answers');	
     $activity->question_id =  $submit_question_id;
     $activity->student_id =  $student_answer_id;
     $activity->answer =  $submit_answer;
     $id = R::store($activity);

     getAnswers($submit_question_id,$student_answer_id);

 }


// Start Grade Codes

 function getGrades()
 {
	$id =   $_SESSION['id'];
	$grades =  R::getAll('SELECT * FROM grades where faculty_id = :faculty_id ' ,array(':faculty_id'=>$id));

 	$content ='<table class="table" id="tb0">
		  		<thead>
		  			<tr><th>Student Name</th>
		  			<th>Activity Code</th>
		  			<th>Type</th>
		  			<th>Grade</th>
		  			<th></th></tr>
		  		</thead>
		  		<tbody>';
		  		foreach ($grades as $g){
		  		$content .=	'<tr><td>'.$g['student_name'].'</td><td>'.$g['activity_code'].'</td><td>'.$g['type'].'</td><td>'.$g['grade'].'</td><td><button class="btn btn-sm btn-danger" onclick="deleteGrade('.$g['id'].')">delete</button></td></tr>';
		  		}

		  		$content .="</tbody>";
		  	$content     .="</table>";
		  	echo $content;
 }

 if (isset($_GET['delete_gradeid'])) {
 	$delete_gradeid =  $_GET['delete_gradeid'];
	$grades   = R::load('grades', $delete_gradeid);
	R::trash( $grades);
	getGrades();
 }
// End Grades Codes


function getallTutorials()
{
	$tutorials =  R::getAll('SELECT * FROM tutorials');
				                        		
		$content = '<ul class="list-unstyled video-list-thumbs ">';
		foreach ($tutorials as $u)
		{
			$content .= '<li class="col-lg-12"><h1>'.$u['content'].'</h1>';
			
			if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
				$content .= ' <button class="btn btn-danger btn-sm" onclick="deletetutorial('.$u['id'].')">Delete</button>';
			}
			
			$content .= $u['link'].'</li>';
	
		}
		$content .= '</ul>';

		echo $content;
}
// Tutorials
 if (isset($_GET['tutorialdata'])) {
	getallTutorials();
 }
  if (isset($_GET['delete_tutorialid'])) {
 	$delete_tutorialid =  $_GET['delete_tutorialid'];
	$t   = R::load('tutorials', $delete_tutorialid);
	R::trash( $t);
	getallTutorials();
 }
// End Tutorials





