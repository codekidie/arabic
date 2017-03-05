<?php 

$users =  R::getAll('SELECT * FROM users');

if (isset($_POST['adduser'])) {
     $user = R::dispense( 'users' );
     $user->firstname = $_POST['firstname'];
     $user->middlename = $_POST['middlename'];
     $user->lastname = $_POST['lastname'];
     $user->email = $_POST['email'];
     $user->username = $_POST['username'];
     $user->password = sha1($_POST['password']);
     $user->role = $_POST['role'];
     $id = R::store( $user );
     if ($id) {
       $_SESSION['prompt_login'] = "User Added Success!";
     }else{
       $_SESSION['prompt_login'] = "Something Went Wrong Please Try Again!";

     }
}

if (isset($_POST['addevent'])) {
     $events = R::dispense( 'events' );
     $events->date_occure = $_POST['date'];
     $events->event_type = $_POST['event_type'];
     $events->description = $_POST['description'];
     $id = R::store( $events );
     if ($id) {
       $_SESSION['prompt_event'] = "Event Added Success!";
     }else{
       $_SESSION['prompt_event'] = "Something Went Wrong Please Try Again!";

     }
}