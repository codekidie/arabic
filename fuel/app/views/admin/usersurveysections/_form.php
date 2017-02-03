<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Userid', 'userid', array('class'=>'control-label')); ?>

				<?php echo Form::input('userid', Input::post('userid', isset($usersurveysection) ? $usersurveysection->userid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Userid')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Surveysectionid', 'surveysectionid', array('class'=>'control-label')); ?>

				<?php echo Form::input('surveysectionid', Input::post('surveysectionid', isset($usersurveysection) ? $usersurveysection->surveysectionid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Surveysectionid')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Completed on', 'completed_on', array('class'=>'control-label')); ?>

				<?php echo Form::input('completed_on', Input::post('completed_on', isset($usersurveysection) ? $usersurveysection->completed_on : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Completed on')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>