<h2>Editing Inputtype</h2>
<br>

<?php echo render('admin/inputtypes/_form'); ?>
<p>
	<?php echo Html::anchor('admin/inputtypes/view/'.$inputtype->id, 'View'); ?> |
	<?php echo Html::anchor('admin/inputtypes', 'Back'); ?></p>
