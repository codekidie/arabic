<h2>Listing Usersurveysections</h2>
<br>
<?php if ($usersurveysections): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Userid</th>
			<th>Surveysectionid</th>
			<th>Completed on</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($usersurveysections as $item): ?>		<tr>

			<td><?php echo $item->userid; ?></td>
			<td><?php echo $item->surveysectionid; ?></td>
			<td><?php echo $item->completed_on; ?></td>
			<td>
				<?php echo Html::anchor('admin/usersurveysections/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/usersurveysections/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/usersurveysections/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Usersurveysections.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/usersurveysections/create', 'Add new Usersurveysection', array('class' => 'btn btn-success')); ?>

</p>
