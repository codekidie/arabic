<h2>Listing Unitofmeasures</h2>
<br>
<?php if ($unitofmeasures): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Unit of measures name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($unitofmeasures as $item): ?>		<tr>

			<td><?php echo $item->unit_of_measures_name; ?></td>
			<td>
				<?php echo Html::anchor('admin/unitofmeasures/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/unitofmeasures/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/unitofmeasures/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Unitofmeasures.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/unitofmeasures/create', 'Add new Unitofmeasure', array('class' => 'btn btn-success')); ?>

</p>
