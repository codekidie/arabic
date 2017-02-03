<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($answer) ? $answer->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Question option id', 'question_option_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('question_option_id', Input::post('question_option_id', isset($answer) ? $answer->question_option_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Question option id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Answer numeric', 'answer_numeric', array('class'=>'control-label')); ?>

				<?php echo Form::input('answer_numeric', Input::post('answer_numeric', isset($answer) ? $answer->answer_numeric : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Answer numeric')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Answer text', 'answer_text', array('class'=>'control-label')); ?>

				<?php echo Form::input('answer_text', Input::post('answer_text', isset($answer) ? $answer->answer_text : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Answer text')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Answer yn', 'answer_yn', array('class'=>'control-label')); ?>

				<?php echo Form::input('answer_yn', Input::post('answer_yn', isset($answer) ? $answer->answer_yn : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Answer yn')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Unit of measure id', 'unit_of_measure_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('unit_of_measure_id', Input::post('unit_of_measure_id', isset($answer) ? $answer->unit_of_measure_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Unit of measure id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>