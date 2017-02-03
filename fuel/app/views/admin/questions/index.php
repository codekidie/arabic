<h2>Listing Questions</h2>
<br>
<?php if ($questions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Question name</th>
			<th>Question subtext</th>
			<th>Answer</th>
			<th>Option group id</th>
			<th>Allow multiple option answers</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($questions as $item): ?>		<tr>

			<td><?php echo $item->question_name; ?></td>
			<td><?php echo $item->question_subtext; ?></td>
			<td><?php echo $item->answer; ?></td>
			<td><?php echo $item->option_group_id; ?></td>
			<td><?php echo $item->allow_multiple_option_answers; ?></td>
			<td>
				<?php echo Html::anchor('admin/questions/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/questions/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/questions/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Questions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/questions/create', 'Add new Question', array('class' => 'btn btn-success')); ?>

</p>
