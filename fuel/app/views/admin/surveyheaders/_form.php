<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Organization id', 'organization_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('organization_id', Input::post('organization_id', isset($surveyheader) ? $surveyheader->organization_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Organization id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Survey name', 'survey_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('survey_name', Input::post('survey_name', isset($surveyheader) ? $surveyheader->survey_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Survey name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Instructions', 'instructions', array('class'=>'control-label')); ?>

				<?php echo Form::input('instructions', Input::post('instructions', isset($surveyheader) ? $surveyheader->instructions : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Instructions')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Other header info', 'other_header_info', array('class'=>'control-label')); ?>

				<?php echo Form::input('other_header_info', Input::post('other_header_info', isset($surveyheader) ? $surveyheader->other_header_info : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Other header info')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>