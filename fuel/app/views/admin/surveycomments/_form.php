<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($surveycomment) ? $surveycomment->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Survey header id', 'survey_header_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('survey_header_id', Input::post('survey_header_id', isset($surveycomment) ? $surveycomment->survey_header_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Survey header id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Comments', 'comments', array('class'=>'control-label')); ?>

				<?php echo Form::input('comments', Input::post('comments', isset($surveycomment) ? $surveycomment->comments : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Comments')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>