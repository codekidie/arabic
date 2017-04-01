
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
      </div>
      <div class="modal-body">
        <div class="studentcontent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="saveuser()">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalEvents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Events</h4>
      </div>
      <div class="modal-body">
        <div class="eventcontent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="saveevent()">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Subject</h4>
      </div>
      <div class="modal-body">
        <div class="modalsubjectcontent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="savesubject()">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Activity</h4>
      </div>
      <div class="modal-body">
      <input type="hidden" id="subject_id" value="<?php echo $_GET['activity_subject_id'] ?>">
      
        <div class="row" style="padding:10px;">
              <label>Select Activity Type</label>
              <select id="activity_select" class="form-control">
                <option>Quiz</option>
                <option>Assignment</option>
                <option>Exam</option>
              </select>

          <br>
          <label>Activity Name</label>
          <input type="text" id="quiz_name" class="form-control" placeholder="Input Activity Name"> 

           <br>
          <label>Submittion Date</label>
          <input type="date" id="quiz_date" class="form-control" > 
              
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="addQuiz()">Add Activity</button>
       
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalEditActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Activity</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" id="subject_id" value="<?php echo $_GET['activity_subject_id'] ?>">
          <div id="editactivityPageWrapper"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="editActivitySubmit()">Submit</button>
       
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modalQuestionaires" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Questions</h4>
      </div>
      <div class="modal-body">

        <div class="row" style="padding:10px;">
              <div class="addQuestions">
      <input type="hidden" id="subject_id" value="<?php echo $_GET['activity_subject_id'] ?>">
              
              <div id="selectbox_container"></div>
                  <input id="questionInput" class="form-control col-md-3" type="text"   placeholder="Question">
                  <input id="correctInput"  class="form-control col-md-3" type="text"   placeholder="Correct Answer">
                  <input id="wrongOneInput" class="form-control col-md-3" type="text"    placeholder="Wrong Answer 1">
                  <input id="wrongTwoInput" class="form-control col-md-3" type="text"    placeholder="Wrong Answer 2">
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="addQuestion()">Add Question</button>
       
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modalQuestionaires" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Questions</h4>
      </div>
      <div class="modal-body">

        <div class="row" style="padding:10px;">
              <div class="addQuestions">
              <input type="hidden" id="subject_id" value="<?php echo $_GET['activity_subject_id'] ?>">
              
              <div id="selectbox_container"></div>
                  <input id="questionInput" class="form-control col-md-3" type="text"   placeholder="Question">
                  <input id="correctInput"  class="form-control col-md-3" type="text"   placeholder="Correct Answer">
                  <input id="wrongOneInput" class="form-control col-md-3" type="text"    placeholder="Wrong Answer 1">
                  <input id="wrongTwoInput" class="form-control col-md-3" type="text"    placeholder="Wrong Answer 2">
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="addQuestion()">Add Question</button>
       
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="viewActivityModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Viewing Activity Questions</h4>
      </div>
      <div class="modal-body">
            <div id="view_activity_questions"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="studentAnswerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Answer Activity</h4>
      </div>
      <div class="modal-body">
            <div id="answer_activity_wrapper"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" id="answer_btn" onclick="addAnswer()">Add Answer</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new User</h4>
      </div>
      <div class="modal-body">
           <form action="" method="POST">
                <?php if (!empty($_SESSION['prompt_login'])): ?>
                        <?php 
                            echo $_SESSION['prompt_login']; 
                             $_SESSION['prompt_login'] = ""; 
                        ?>
                <?php endif ?>


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
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button class="btn btn-primary" type="submit" name="adduser">Submit</button>     
         </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addNewEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new Event</h4>
      </div>
      <div class="modal-body">
           <form action="" method="POST">
              <?php if (!empty($_SESSION['prompt_event'])): ?>
                      <?php 
                          echo $_SESSION['prompt_event']; 
                           $_SESSION['prompt_event'] = ""; 
                      ?>
              <?php endif ?>
              <?php 
                if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
               ?>

              <label>Date</label>
              <input type="date" name="date" class="form-control" required autofocus>

              <label>Event Type </label>
              <input type="text" name="event_type" class="form-control" required autofocus>

              <label>Description</label>
              <textarea name="description" class="form-control"></textarea>
            
              <hr>
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" name="addevent">Submit</button>
                                  <?php } ?>   
         </form>
      </div>
    </div>
  </div>
</div>

                       

<div class="modal fade" id="addNewSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Subject</h4>
      </div>
      <div class="modal-body">
                <form action="" method="POST">
                        <?php 

                      if (!empty($_SESSION['role']) && $_SESSION['role'] != 'student') {
                     ?>
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
                    <hr style="clear: both;">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button class="btn btn-primary" id="addsubject" name="addsubject">Submit</button>
                      <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 . &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->
   </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="assets/js/jquery.min.js"></script> -->
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js">
      </script>
      <script src="assets/js/holder.min.js"></script>
      <script src="assets/js/activitypage.js"></script>
      <script src="assets/js/custom.js"></script>
      <script src="assets/js/toastr.min.js"></script>
      <script src="assets/js/jquery-confirm.min.js"></script>

  </body>
</html>