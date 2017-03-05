var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/arabic/";

function editstudent(id)
     {
        $('#myModal').modal('show'); 
        
        $.ajax({
          url: baseUrl+"ajax.php?studentid="+id,
         }).done(function(data) {
            $('.studentcontent').html(data);
        });
}

function saveuser()
{
   var studentid =  $('#studentid').val();
   var firstname =  $('#firstname').val();
   var middlename =  $('#middlename').val();
   var lastname   =  $('#lastname').val();
   var role       =  $('#role').val();
   var username =  $('#username').val();
   var password =  $('#password').val();

   $.ajax({
      url: baseUrl+"ajax.php?save_userid="+studentid+"&firstname="+firstname+"&middlename="+middlename+"&lastname="+lastname+"&role="+role+"&username="+username+"&password="+password,
     }).done(function(data) {
        $('#student').html(data);
        $('#tb1').DataTable();

        toastr.success('User Success Edited');
    });
}



function editevent(id)
     {
        $('#modalEvents').modal('show'); 
        $.ajax({
          url: baseUrl+"ajax.php?eventid="+id,
         }).done(function(data) {
            $('.eventcontent').html(data);
        });
}

function saveevent()
{
   var eventid     =  $('#eventid').val();
   var date_occure =  $('#date_occure').val();
   var event_type  =  $('#event_type').val();
   var description =  $('#description').val();

     $.ajax({
      url: baseUrl+"ajax.php?save_eventid="+eventid+"&date_occure="+date_occure+"&event_type="+event_type+"&description="+description,
     }).done(function(data) {
        $('#events_data').html(data);
        $('#tb2').DataTable();
        toastr.success('Event Successfully Edited');
    });

    
}

function deleteuser(id)
{
    $.ajax({
      url: baseUrl+"ajax.php?delete_userid="+id,
     }).done(function(data) {
        $('#student').html(data);
        $('#tb1').DataTable();
        toastr.success('User Successfully Deleted');
    });
}

function deleteevent(id)
{
    $.ajax({
      url: baseUrl+"ajax.php?delete_eventid="+id,
     }).done(function(data) {
        $('#events_data').html(data);
        $('#tb2').DataTable();
        toastr.success('Event Successfully Deleted');
    });
}

// Start Subject Data
$('#addsubject').click(function(e){
    e.preventDefault();
   var subject_student_id  = $('#subject_student_id').val();
   var subject_faculty_id  = $('#subject_faculty_id').val();
   var subject_description = $('#subject_description').val();
   var subjectname  = $('#subjectname').val();
   var subjectcode         = $('#subjectcode').val();

   $.ajax({
      url: baseUrl+"ajax.php?subject_student_id="+subject_student_id+"&subject_faculty_id="+subject_faculty_id+"&subject_description="+subject_description+"&subjectname="+subjectname+"&subjectcode="+subjectcode,
     }).done(function(data) {
        $('#subjectdata').html(data);
        $('#tb0').DataTable();
        toastr.success('Subject Successfully Added');
    });

});
    
$.ajax({
  url: baseUrl+"ajax.php?subject_student_id=none",
 }).done(function(data) {
    $('#subjectdata').html(data);
    $('#tb0').DataTable();
});

function deletesubject(id)
{
    $.ajax({
      url: baseUrl+"ajax.php?delete_subjectid="+id,
     }).done(function(data) {
        $('#subjectdata').html(data);
        $('#tb0').DataTable();
        toastr.success('Subject Successfully Deleted');
    });
}


function editsubject(id)
     {
        $('#modalSubject').modal('show'); 
        
        $.ajax({
          url: baseUrl+"ajax.php?subject_editid="+id,
         }).done(function(data) {
            $('.modalsubjectcontent').html(data);
        });
}


function savesubject()
{
   var subjectid =    $('#modalsubjectid').val();
   var subjectcode =  $('#modalsubjectcode').val();
   var subjectname =  $('#modalsubjectname').val();
   var subject_description  =  $('#modalsubject_description').val();
   var subject_student_id   =  $('#modalsubject_student_id').val();
   var subject_faculty_id   =  $('#modalsubject_faculty_id').val();

   $.ajax({
      url: baseUrl+"ajax.php?modalsubjectid="+subjectid+"&modalsubjectcode="+subjectcode+"&modalsubjectname="+subjectname+"&modalsubject_description="+subject_description+"&modalsubject_student_id="+subject_student_id+"&modalsubject_faculty_id="+subject_faculty_id,
     }).done(function(data) {
        $('#subjectdata').html(data);
        $('#tb0').DataTable();
        toastr.success('Subject Success Edited');
    });
}

 

$(document).ready(function(){ 
    $('#characterLeft').text('140 characters left');
    $('#message').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });   

     $('#tb0').DataTable();
     $('#tb1').DataTable();
     $('#tb2').DataTable();

});
