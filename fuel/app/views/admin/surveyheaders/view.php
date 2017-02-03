<h2>Viewing #<?php echo $surveyheader->id; ?></h2>

<p>
	<strong>Organization id:</strong>
	<?php echo $surveyheader->organization_id; ?></p>
<p>
	<strong>Survey name:</strong>
	<?php echo $surveyheader->survey_name; ?></p>
<p>
	<strong>Instructions:</strong>
	<?php echo $surveyheader->instructions; ?></p>
<p>
	<strong>Other header info:</strong>
	<?php echo $surveyheader->other_header_info; ?></p>

<?php echo Html::anchor('admin/surveyheaders/edit/'.$surveyheader->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/surveyheaders', 'Back'); ?>