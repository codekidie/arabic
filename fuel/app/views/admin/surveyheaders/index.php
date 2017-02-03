<h2>Listing Surveyheaders</h2>
<br>
<?php if ($surveyheaders): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Organization id</th>
			<th>Survey name</th>
			<th>Instructions</th>
			<th>Other header info</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($surveyheaders as $item): ?>		<tr>

			<td><?php echo $item->organization_id; ?></td>
			<td><?php echo $item->survey_name; ?></td>
			<td><?php echo $item->instructions; ?></td>
			<td><?php echo $item->other_header_info; ?></td>
			<td>
				<?php echo Html::anchor('admin/surveyheaders/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/surveyheaders/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/surveyheaders/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Surveyheaders.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/surveyheaders/create', 'Add new Surveyheader', array('class' => 'btn btn-success')); ?>

</p>
