<?php 
session_start();
include("rb.php"); 
require_once("con.php");


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
				</thead>';
		foreach ($users as $u)
		{
			$content .= '<tbody>
					<tr>
						<td>'.$u['firstname'].'</td>
						<td>'.$u['middlename'].'</td>
						<td>'.$u['lastname'].'</td>
						<td>'.$u['username'].'</td>
						<td>'.$u['email'].'</td>
						<td>'.$u['role'].'</td>
						<td><button class="btn btn-info btn-sm btn-block" onclick="editstudent('.$u['id'].')">Edit</button>
							 <button class="btn btn-danger btn-sm btn-block" onclick="deleteuser('.$u['id'].')">Delete</button></td>
					</tr>
				</tbody>';
		}
			$content .= '</table>';

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
function getSubjects(){
	$users =  R::getAll('SELECT * FROM subjects');
		$content = '<table class="table" id="tb0">
					<thead>
						<tr>
							<th>Name</th>
							<th>Code</th>
							<th>Description</th>
							<th>Student</th>
							<th>Faculty</th>';
						if ($_SESSION['role'] != 'student' && !empty($_SESSION['role'])) {
							$content .= '<th>Actions</th>';
						}
						$content .= '</tr>
					</thead>';
			foreach ($users as $u)
			{
				$student = R::load( 'users',$u['student_id']);
				$faculty = R::load( 'users',$u['faculty_id']);
				$content .= '<tbody>
						<tr>
							<td>'.$u['subname'].'</td>
							<td>'.$u['subject_code'].'</td>
							<td>'.$u['subdescription'].'</td>
							<td>'.$student->firstname." ".$student->middlename." ".$student->lastname.'</td>
							<td>'.$faculty->firstname." ".$student->middlename." ".$student->lastname.'</td>';
						if ($_SESSION['role'] != 'student' && !empty($_SESSION['role'])) {

							$content .= '
							<td>
							<button class="btn btn-info btn-sm btn-block" onclick="editsubject('.$u['id'].')">Edit</button>
							<button class="btn btn-danger btn-sm btn-block" onclick="deletesubject('.$u['id'].')">Delete</button></td>';
						}	
						$content .= '</tr>
					</tbody>';
			}
		
		$content .= '</table>';
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
     	getSubjects();
     }

}else if(isset($_GET['subject_student_id']) && $_GET['subject_student_id'] == 'none'){
     	getSubjects();
}


if (isset($_GET['delete_subjectid'])) {
	$delete_subjectid =  $_GET['delete_subjectid'];
	$subjects         =  R::load( 'subjects', $delete_subjectid);
	R::trash($subjects);
    getSubjects();

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
		getSubjects();
	}
}




