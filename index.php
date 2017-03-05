<?php 
    require_once("layouts/header.php");   
    require_once("layouts/slider.php");    
    require_once("rb.php");
    require_once("con.php");
    require_once("controllers/index.php");
?>
<div class="container">
<div class="col-md-12">
               <div class="panel with-nav-tabs panel-info">
                        <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#subjectpanel" data-toggle="tab">Subject</a></li>
                                    <?php if ( $_SESSION['role'] == 'admin' || $_SESSION['role'] == 'faculty'): ?>
                                    <li><a href="#studentdata" data-toggle="tab">Users</a></li>
                                    <?php endif ?>
                                    <li><a href="#events" data-toggle="tab">Events</a></li>
                                    <li><a href="#tab4default" data-toggle="tab">Tutorials</a></li>
                                    
                                </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="subjectpanel">
                                <div id="subjectdata"></div>
                                      <form action="" method="POST" class="col-md-5 col-sm-12">
                                      <?php 
                                    if ($_SESSION['role'] != 'student' && !empty($_SESSION['role'])) {
                                   ?>
                                  <h2 class="form-signin-heading">Add new Subject</h2>
                                  <label>Subject Code</label>
                                  <input type="text" name="subjectcode" id="subjectcode" class="form-control" required autofocus>

                                  <label>Subject Name </label>
                                  <input type="text" name="subjectname" id="subjectname" class="form-control" required autofocus>

                                  <label>Subject Description</label>
                                  <textarea name="description" id="subject_description" class="form-control"></textarea>
                                  <?php 
                                    $studentdata = R::getAll('SELECT * FROM users where role = :role',array(':role'=>'student'));
                                    $facultydata = R::getAll('SELECT * FROM users where role = :role',array(':role'=>'faculty'));
                                  ?>
                                  <label>Student Name</label>
                                  <select name="student_id" id="subject_student_id" class="form-control">
                                      <?php foreach ($studentdata as $sd): ?>
                                            <option value="<?php echo $sd['id']; ?>"><?php echo $sd['firstname']." ".$sd['middlename']." ".$sd['lastname']; ?></option>
                                        <?php endforeach ?> 
                                  </select> 

                                  <label>Faculty Name</label>
                                  <select name="faculty_id" id="subject_faculty_id" class="form-control">
                                      <?php foreach ($facultydata as $sd): ?>
                                            <option value="<?php echo $sd['id']; ?>"><?php echo $sd['firstname']." ".$sd['middlename']." ".$sd['lastname']; ?></option>
                                        <?php endforeach ?> 
                                  </select> 
                                  <hr>
                                  <button class="btn btn-lg btn-primary btn-block" id="addsubject" name="addsubject">Submit</button>
                                <?php } ?>
                              </form>
                                </div>
                                <div class="tab-pane fade" id="studentdata">
                                    <div id="student">
                                          <?php if (empty($users)): ?>
                                              <h3>No users founds!</h3>
                                          <?php else: ?>
                                                  <table class="table" id="tb1">
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
                                                    </thead>
                                              <?php foreach ($users as $u): ?>
                                                    <tbody>
                                                      <tr>
                                                        <td><?php echo $u['firstname']; ?></td>
                                                        <td><?php echo $u['middlename'];?></td>
                                                        <td><?php echo $u['lastname'];?></td>
                                                        <td><?php echo $u['username'];?></td>
                                                        <td><?php echo $u['email'];?></td>
                                                        <td><?php echo $u['role'];?></td>
                                                        <td><button class="btn btn-info btn-sm btn-block" onclick="editstudent(<?php echo $u['id'];  ?>)">Edit</button>
                                                           <button class="btn btn-danger btn-sm btn-block" onclick="deleteuser(<?php echo $u['id'];  ?>)">Delete</button></td>
                                                      </tr>
                                                    </tbody>
                                              <?php endforeach ?>
                                                  </table>

                                          <?php endif ?>
                                    </div>
                                
                         
                                        <form action="" method="POST" class="col-md-5 col-sm-12">
                                  <?php if (!empty($_SESSION['prompt_login'])): ?>
                                          <?php 
                                              echo $_SESSION['prompt_login']; 
                                               $_SESSION['prompt_login'] = ""; 
                                          ?>
                                  <?php endif ?>
                                <h2 class="form-signin-heading">Add new User</h2>

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
                                
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="adduser">Submit</button>
                               
                              </form>
                                </div>
                                <div class="tab-pane fade" id="events">
                                    <div id="events_data">  
                                        <?php  $events =  R::getAll('SELECT * FROM events'); ?>
                                        <?php if (empty($events)): ?>
                                              <h3>No event founds!</h3>
                                          <?php else: ?>
                                                  <table class="table" id="tb2">
                                                    <thead>
                                                      <tr>
                                                        <th>Date</th>
                                                        <th>Event Type</th>
                                                        <th>Description</th>
                                                        <?php if ($_SESSION['role'] != 'student' && !empty($_SESSION['role']) ): ?>
                                                        <th>Actions</th>
                                                          
                                                        <?php endif ?>
                                                      </tr>
                                                    </thead>
                                              <?php foreach ($events as $e): ?>
                                                    <tbody>
                                                      <tr>
                                                        <td><?php echo $e['date_occure']; ?></td>
                                                        <td><?php echo $e['event_type'];?></td>
                                                        <td><?php echo $e['description'];?></td>
                                                        <?php if ($_SESSION['role'] != 'student' && !empty($_SESSION['role'])): ?>

                                                        <td><button class="btn btn-info btn-sm btn-block" onclick="editevent(<?php echo $e['id'];  ?>)">Edit</button>
                                                           <button class="btn btn-danger btn-sm btn-block" onclick="deleteevent(<?php echo $e['id'];  ?>)">Delete</button></td>
                                                        <?php endif ?>

                                                      </tr>
                                                    </tbody>
                                              <?php endforeach ?>
                                                  </table>

                                          <?php endif ?>
                                    </div>

                                           <form action="" method="POST" class="col-md-5 col-sm-12">
                                  <?php if (!empty($_SESSION['prompt_event'])): ?>
                                          <?php 
                                              echo $_SESSION['prompt_event']; 
                                               $_SESSION['prompt_event'] = ""; 
                                          ?>
                                  <?php endif ?>
                                  <?php 
                                    if ($_SESSION['role'] != 'student' && !empty($_SESSION['role'])) {
                                   ?>
                                  <h2 class="form-signin-heading">Add new Event</h2>

                                  <label>Date</label>
                                  <input type="date" name="date" class="form-control" required autofocus>

                                  <label>Event Type </label>
                                  <input type="text" name="event_type" class="form-control" required autofocus>

                                  <label>Description</label>
                                  <textarea name="description" class="form-control"></textarea>
                                
                                  <hr>
                                  <button class="btn btn-lg btn-primary btn-block" type="submit" name="addevent">Submit</button>
                                  <?php } ?>
                              </form>
                                </div>
                                <div class="tab-pane fade" id="tab4default">Tutorials</div>
                            </div>
                        </div>
               </div>
              
        </div>

<?php 
    require_once("layouts/footer.php");    
?>