<h2>Listing Optionchoices</h2>
<br>
<?php if ($optionchoices): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Optiongroupid</th>
			<th>Option choice name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($optionchoices as $item): ?>		<tr>

			<td><?php echo $item->optiongroupid; ?></td>
			<td><?php echo $item->option_choice_name; ?></td>
			<td>
				<?php echo Html::anchor('admin/optionchoices/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/optionchoices/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/optionchoices/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Optionchoices.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/optionchoices/create', 'Add new Optionchoice', array('class' => 'btn btn-success')); ?>

</p>
