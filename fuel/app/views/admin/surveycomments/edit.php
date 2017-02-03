<h2>Editing Surveycomment</h2>
<br>

<?php echo render('admin/surveycomments/_form'); ?>
<p>
	<?php echo Html::anchor('admin/surveycomments/view/'.$surveycomment->id, 'View'); ?> |
	<?php echo Html::anchor('admin/surveycomments', 'Back'); ?></p>
