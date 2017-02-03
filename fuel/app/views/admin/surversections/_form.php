<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Survey header id', 'survey_header_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('survey_header_id', Input::post('survey_header_id', isset($surversection) ? $surversection->survey_header_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Survey header id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Section name', 'section_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('section_name', Input::post('section_name', isset($surversection) ? $surversection->section_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Section name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Section title', 'section_title', array('class'=>'control-label')); ?>

				<?php echo Form::input('section_title', Input::post('section_title', isset($surversection) ? $surversection->section_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Section title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Section subheading', 'section_subheading', array('class'=>'control-label')); ?>

				<?php echo Form::input('section_subheading', Input::post('section_subheading', isset($surversection) ? $surversection->section_subheading : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Section subheading')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Section required yn', 'section_required_yn', array('class'=>'control-label')); ?>

				<?php echo Form::input('section_required_yn', Input::post('section_required_yn', isset($surversection) ? $surversection->section_required_yn : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Section required yn')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>