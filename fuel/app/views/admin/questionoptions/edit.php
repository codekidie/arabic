<h2>Editing Questionoption</h2>
<br>

<?php echo render('admin/questionoptions/_form'); ?>
<p>
	<?php echo Html::anchor('admin/questionoptions/view/'.$questionoption->id, 'View'); ?> |
	<?php echo Html::anchor('admin/questionoptions', 'Back'); ?></p>
