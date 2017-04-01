<?php 
    require_once("layouts/header.php");   
    require_once("controllers/index.php");
    require_once("layouts/slider.php");    

?>
<div class="container">
   <?php if (!empty($_SESSION['prompt'])): ?>
            <p style="color:green"><?php echo $_SESSION['prompt']; ?></p>
            <?php $_SESSION['prompt'] = ""; ?>
   <?php endif ?>
<div class="col-md-12">
               <div class="panel with-nav-tabs panel-info">
                        <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li><a href="#subjectpanel" data-toggle="tab">Subject</a></li>
                                    <?php if (!empty($_SESSION['role'])): ?>
                                          <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'faculty' ): ?>
                                              <li><a href="#studentdata" data-toggle="tab">Users</a></li>
                                          <?php endif ?>
                                    <?php endif ?>
                                    <li class="active" ><a href="#events" data-toggle="tab">Events</a></li>
                                    <li><a href="#tab4default" data-toggle="tab">Tutorials</a></li>
                                    
                                </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade" id="subjectpanel">
                                  <?php if ( !empty($_SESSION['role']) && $_SESSION['role'] == 'admin' ): ?>
                                  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addNewSubject">
                                    Add new Subject
                                  </button>
                                    <?php endif ?>

                                  <hr>
                                <div id="subjectdata"></div>
                                    
                                </div>
                                <div class="tab-pane fade" id="studentdata">
                                  <?php if ( !empty($_SESSION['role']) && $_SESSION['role'] == 'admin' ): ?>
                                 <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addNewUser">
                                    Add new User
                                  </button>
                                    <?php endif ?>

                                  <hr>
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
                                                    <?php if ( !empty($_SESSION['role']) && $_SESSION['role'] != 'faculty' ): ?>
                                                            <th>Actions</th>
                                                        <?php endif ?>
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
                                                    <?php if ( !empty($_SESSION['role']) && $_SESSION['role'] != 'faculty' ): ?>

                                                        <td><button class="btn btn-info btn-sm btn-block" onclick="editstudent(<?php echo $u['id'];  ?>)">Edit</button>
                                                           <button class="btn btn-danger btn-sm btn-block" onclick="deleteuser(<?php echo $u['id'];  ?>)">Delete</button></td>
                                                        <?php endif ?>
                                                           
                                                      </tr>
                                                    </tbody>
                                              <?php endforeach ?>
                                                  </table>

                                          <?php endif ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade in active" id="events">
                                  <?php if ( !empty($_SESSION['role']) && $_SESSION['role'] == 'admin' ): ?>

                                 <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addNewEvent">
                                    Add new Event
                                  </button>
                                    <?php endif ?>
                                  
                                  <hr>
                                
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
                                                        <?php if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student'): ?>
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
                                                        <?php if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student'): ?>

                                                        <td><button class="btn btn-info btn-sm btn-block" onclick="editevent(<?php echo $e['id'];  ?>)">Edit</button>
                                                           <button class="btn btn-danger btn-sm btn-block" onclick="deleteevent(<?php echo $e['id'];  ?>)">Delete</button></td>
                                                        <?php endif ?>

                                                      </tr>
                                                    </tbody>
                                              <?php endforeach ?>
                                                  </table>

                                          <?php endif ?>
                                    </div>

                              
                                </div>
                                <div class="tab-pane fade" id="tab4default">
                                <?php if (!empty($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                         <form action="upload.php" method="POST" class="col-md-4" enctype="multipart/form-data">
                                             Video Link Here:
                                            <input name="link" type="text"  class="form-control" id="link">
                                            <hr>
                                            <textarea name="content" class="form-control"></textarea>
                                            <hr>
                                            <input type="submit" class="btn btn-info form-control" value="Upload Image" name="submit">
                                        </form>

                                <?php endif ?>

                                    <div id="tutordetails"></div>

                                       
                                </div>
                            </div>
                        </div>
               </div>
              
        </div>

<?php 
    require_once("layouts/footer.php");    
?>