<h2>Listing Inputtypes</h2>
<br>
<?php if ($inputtypes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Input type name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($inputtypes as $item): ?>		<tr>

			<td><?php echo $item->input_type_name; ?></td>
			<td>
				<?php echo Html::anchor('admin/inputtypes/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/inputtypes/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/inputtypes/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Inputtypes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/inputtypes/create', 'Add new Inputtype', array('class' => 'btn btn-success')); ?>

</p>
