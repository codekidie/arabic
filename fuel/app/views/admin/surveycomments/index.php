<h2>Listing Surveycomments</h2>
<br>
<?php if ($surveycomments): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>Survey header id</th>
			<th>Comments</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($surveycomments as $item): ?>		<tr>

			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->survey_header_id; ?></td>
			<td><?php echo $item->comments; ?></td>
			<td>
				<?php echo Html::anchor('admin/surveycomments/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/surveycomments/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/surveycomments/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Surveycomments.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/surveycomments/create', 'Add new Surveycomment', array('class' => 'btn btn-success')); ?>

</p>
