<h2>Viewing #<?php echo $optionchoice->id; ?></h2>

<p>
	<strong>Optiongroupid:</strong>
	<?php echo $optionchoice->optiongroupid; ?></p>
<p>
	<strong>Option choice name:</strong>
	<?php echo $optionchoice->option_choice_name; ?></p>

<?php echo Html::anchor('admin/optionchoices/edit/'.$optionchoice->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/optionchoices', 'Back'); ?>