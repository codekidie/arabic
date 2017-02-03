<h2>Listing Surversections</h2>
<br>
<?php if ($surversections): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Survey header id</th>
			<th>Section name</th>
			<th>Section title</th>
			<th>Section subheading</th>
			<th>Section required yn</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($surversections as $item): ?>		<tr>

			<td><?php echo $item->survey_header_id; ?></td>
			<td><?php echo $item->section_name; ?></td>
			<td><?php echo $item->section_title; ?></td>
			<td><?php echo $item->section_subheading; ?></td>
			<td><?php echo $item->section_required_yn; ?></td>
			<td>
				<?php echo Html::anchor('admin/surversections/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/surversections/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/surversections/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Surversections.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/surversections/create', 'Add new Surversection', array('class' => 'btn btn-success')); ?>

</p>
