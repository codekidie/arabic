<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Input type name', 'input_type_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('input_type_name', Input::post('input_type_name', isset($inputtype) ? $inputtype->input_type_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Input type name')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>