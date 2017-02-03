<h2>Editing Surversection</h2>
<br>

<?php echo render('admin/surversections/_form'); ?>
<p>
	<?php echo Html::anchor('admin/surversections/view/'.$surversection->id, 'View'); ?> |
	<?php echo Html::anchor('admin/surversections', 'Back'); ?></p>
