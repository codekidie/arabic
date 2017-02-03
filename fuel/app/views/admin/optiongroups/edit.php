<h2>Editing Optiongroup</h2>
<br>

<?php echo render('admin/optiongroups/_form'); ?>
<p>
	<?php echo Html::anchor('admin/optiongroups/view/'.$optiongroup->id, 'View'); ?> |
	<?php echo Html::anchor('admin/optiongroups', 'Back'); ?></p>
