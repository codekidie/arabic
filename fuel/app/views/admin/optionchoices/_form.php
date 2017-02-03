<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Optiongroupid', 'optiongroupid', array('class'=>'control-label')); ?>

				<?php echo Form::input('optiongroupid', Input::post('optiongroupid', isset($optionchoice) ? $optionchoice->optiongroupid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Optiongroupid')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Option choice name', 'option_choice_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('option_choice_name', Input::post('option_choice_name', isset($optionchoice) ? $optionchoice->option_choice_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Option choice name')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>