<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Question name', 'question_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('question_name', Input::post('question_name', isset($question) ? $question->question_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Question name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Question subtext', 'question_subtext', array('class'=>'control-label')); ?>

				<?php echo Form::input('question_subtext', Input::post('question_subtext', isset($question) ? $question->question_subtext : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Question subtext')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Answer', 'answer', array('class'=>'control-label')); ?>

				<?php echo Form::input('answer', Input::post('answer', isset($question) ? $question->answer : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Answer')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Option group id', 'option_group_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('option_group_id', Input::post('option_group_id', isset($question) ? $question->option_group_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Option group id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Allow multiple option answers', 'allow_multiple_option_answers', array('class'=>'control-label')); ?>

				<?php echo Form::input('allow_multiple_option_answers', Input::post('allow_multiple_option_answers', isset($question) ? $question->allow_multiple_option_answers : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Allow multiple option answers')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>