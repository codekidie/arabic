<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Unit of measures name', 'unit_of_measures_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('unit_of_measures_name', Input::post('unit_of_measures_name', isset($unitofmeasure) ? $unitofmeasure->unit_of_measures_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Unit of measures name')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>