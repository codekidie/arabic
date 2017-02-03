<h2>Viewing #<?php echo $unitofmeasure->id; ?></h2>

<p>
	<strong>Unit of measures name:</strong>
	<?php echo $unitofmeasure->unit_of_measures_name; ?></p>

<?php echo Html::anchor('admin/unitofmeasures/edit/'.$unitofmeasure->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/unitofmeasures', 'Back'); ?>