<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Question id', 'question_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('question_id', Input::post('question_id', isset($questionoption) ? $questionoption->question_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Question id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Option choice id', 'option_choice_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('option_choice_id', Input::post('option_choice_id', isset($questionoption) ? $questionoption->option_choice_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Option choice id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>