<h2>Editing Surveyheader</h2>
<br>

<?php echo render('admin/surveyheaders/_form'); ?>
<p>
	<?php echo Html::anchor('admin/surveyheaders/view/'.$surveyheader->id, 'View'); ?> |
	<?php echo Html::anchor('admin/surveyheaders', 'Back'); ?></p>
