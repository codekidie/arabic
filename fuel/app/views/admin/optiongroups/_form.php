<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Option group name', 'option_group_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('option_group_name', Input::post('option_group_name', isset($optiongroup) ? $optiongroup->option_group_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Option group name')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>