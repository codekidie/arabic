var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/arabic/";

  var subject_activeid = $('#subject_active_id').val();
      console.log('test');
  
  $.ajax({
      url: baseUrl+"ajax.php?activity_subject_id="+subject_activeid,
     }).done(function(data) {
      $('#activity_wrapper').html(data);
      $('#tb0').DataTable();
    });

    $.ajax({
      url: baseUrl+"ajax.php?tutorialdata=1",
     }).done(function(data) {
        $('#tutordetails').html(data);
    });

     
function  deletetutorial(id)
{
   $.confirm({
          title: 'Are You Sure You Want To Delete?',
          content: '',
          buttons: {
              confirm: function () {
                    $.ajax({
                      url: baseUrl+"ajax.php?delete_tutorialid="+id,
                     }).done(function(data) {
                        toastr.success('Tutorial Successfully Deleted');
                       $('#tutordetails').html(data);

                    });
              },
              cancel: function () {
                  $.alert('Canceled!');
              },
          }
      }); 
}  

    

function addQuiz()
{
   var subject_id      =  $('#subject_id').val();
   var activity_select =  $('#activity_select').val();
   var quiz_name       =  $('#quiz_name').val();
   var quiz_date       =  $('#quiz_date').val();

     $.ajax({
      url: baseUrl+"ajax.php?addquestion=1&subject_id="+subject_id+"&activity_select="+activity_select+"&quiz_name="+quiz_name+"&quiz_date="+quiz_date,
     }).done(function(data) {
      $('#modalActivity').modal('toggle');
      $('#activity_wrapper').html(data);
        toastr.success('Activity Successfully Added');

        window.location.href = baseUrl+"activity.php?activity_subject_id="+subject_id;
    });
}

function addQuestion()
{
   var subject_id =  $('#subject_id').val();
   var activity_name = $('#activity_name').val();
   var activity_id = $('#questionaire_activity_id').val();

  var question = $('#questionInput').val();
  var correct =  $('#correctInput').val();
  var wrongone =  $('#wrongOneInput').val();
  var wrongtwo = $('#wrongTwoInput').val();

   $.ajax({
      url: baseUrl+"ajax.php?submitquestion=1&subject_id="+subject_id+"&activity_name="+activity_name+"&question="+question+"&correct="+correct+"&wrongone="+wrongone+"&wrongtwo="+wrongtwo+"&activity_id="+activity_id,
     }).done(function(data) {
      $('#modalQuestionaires').modal('toggle');
      $('#activity_wrapper').html(data);
        toastr.success('Question Successfully Added');
    });
}


function deleteactivity(id)
{

      $.confirm({
          title: 'Are You Sure You Want To Delete?',
          content: '',
          buttons: {
              confirm: function () {
                   $.ajax({
                      url: baseUrl+"ajax.php?deleteactivity="+id,
                     }).done(function(data) {
                       $('#activity_wrapper').html(data);
                        toastr.success('Activity Successfully Deleted');
                    });
              },
              cancel: function () {
                  $.alert('Canceled!');
              },
          }
      }); 
}

function editactivity(id)
{
    $('#modalEditActivity').modal('show'); 

    $.ajax({
      url: baseUrl+"ajax.php?editactivity_id="+id,
     }).done(function(data) {
        $('#editactivityPageWrapper').html(data);
    });
}

function editActivitySubmit()
{
   var subject_id      =  $('#modal_subject_id').val();
   var activity_select =  $('#modal_activity_select').val();
   var quiz_name       =  $('#modal_quiz_name').val();
   var quiz_date       =  $('#modal_quiz_date').val();
   var activity_id     =  $('#modal_activity_id').val();

     $.ajax({
      url: baseUrl+"ajax.php?submit_edited_acitvity=1&subject_id="+subject_id+"&activity_select="+activity_select+"&quiz_name="+quiz_name+"&quiz_date="+quiz_date+"&activity_id="+activity_id,
     }).done(function(data) {
      $('#modalEditActivity').modal('toggle');
      $('#activity_wrapper').html(data);
        toastr.success('Activity Successfully Edited');
    });
}

function viewactivity(id)
{
    $('#viewActivityModal').modal('show'); 

    $.ajax({
      url: baseUrl+"ajax.php?view_acitvity="+id,
     }).done(function(data) {
      $('#view_activity_questions').html(data);
    });
}

$('#addnewQuestion').click(function(){
     var subject_id =  $('#subject_id').val();
     $.ajax({
       url: baseUrl+"ajax.php?subject_id="+subject_id+"&addnewselector=1",
     }).done(function(data) {
           $('#selectbox_container').html(data);
    });
});

function deleteQuestion(id)
{
   var activity_id     =  $('#modal_activity_id').val();
    
    $.confirm({
          title: 'Are You Sure You Want To Delete?',
          content: '',
          buttons: {
              confirm: function () {
                   $.ajax({
                      url: baseUrl+"ajax.php?deleteQuestion_id="+id+"&view_acitvity_question_id="+activity_id,
                     }).done(function(data) {
                        $('#view_activity_questions').html(data);
                        toastr.success('Question Successfully Deleted');
                    });
              },
              cancel: function () {
                  $.alert('Canceled!');
              },
          }
      }); 

    
}



// Student Answer Activity
function answeractivity(id)
{
    $('#studentAnswerModal').modal('show'); 
     
     $.ajax({
      url: baseUrl+"ajax.php?answerStudentModal="+id,
     }).done(function(data) {
        $('#answer_activity_wrapper').html(data);
            if ($(".has_answer").length){
              $("#answer_btn").hide();
            }else{
              $("#answer_btn").show();
            }
    });
}

function addAnswer()
{
    var total_questions = $('#total_questions').val();
    var answer_user_id = $('#answer_user_id').val();
    var answer_quiz_name = $('#answer_quiz_name').val();

    for (var i = 1; i <= total_questions; i++) {
       var answer = $('input[name="question'+i+'"]:checked').val();
       var question_id = $('#question_id_'+i).val();
       
        $.ajax({
          url: baseUrl+"ajax.php?submit_answer="+answer+'&student_answer_id='+answer_user_id+'&submit_question_id='+question_id,
         }).done(function(data) {
               $('#answer_activity_wrapper').html(data);
        });

    }
}



