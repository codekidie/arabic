<h2>Editing Optionchoice</h2>
<br>

<?php echo render('admin/optionchoices/_form'); ?>
<p>
	<?php echo Html::anchor('admin/optionchoices/view/'.$optionchoice->id, 'View'); ?> |
	<?php echo Html::anchor('admin/optionchoices', 'Back'); ?></p>
