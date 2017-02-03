<h2>Viewing #<?php echo $inputtype->id; ?></h2>

<p>
	<strong>Input type name:</strong>
	<?php echo $inputtype->input_type_name; ?></p>

<?php echo Html::anchor('admin/inputtypes/edit/'.$inputtype->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/inputtypes', 'Back'); ?>