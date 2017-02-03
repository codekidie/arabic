<h2>Viewing #<?php echo $optiongroup->id; ?></h2>

<p>
	<strong>Option group name:</strong>
	<?php echo $optiongroup->option_group_name; ?></p>

<?php echo Html::anchor('admin/optiongroups/edit/'.$optiongroup->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/optiongroups', 'Back'); ?>