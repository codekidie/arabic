<h2>Viewing #<?php echo $surversection->id; ?></h2>

<p>
	<strong>Survey header id:</strong>
	<?php echo $surversection->survey_header_id; ?></p>
<p>
	<strong>Section name:</strong>
	<?php echo $surversection->section_name; ?></p>
<p>
	<strong>Section title:</strong>
	<?php echo $surversection->section_title; ?></p>
<p>
	<strong>Section subheading:</strong>
	<?php echo $surversection->section_subheading; ?></p>
<p>
	<strong>Section required yn:</strong>
	<?php echo $surversection->section_required_yn; ?></p>

<?php echo Html::anchor('admin/surversections/edit/'.$surversection->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/surversections', 'Back'); ?>