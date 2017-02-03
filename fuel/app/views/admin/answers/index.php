<h2>Listing Answers</h2>
<br>
<?php if ($answers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>Question option id</th>
			<th>Answer numeric</th>
			<th>Answer text</th>
			<th>Answer yn</th>
			<th>Unit of measure id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($answers as $item): ?>		<tr>

			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->question_option_id; ?></td>
			<td><?php echo $item->answer_numeric; ?></td>
			<td><?php echo $item->answer_text; ?></td>
			<td><?php echo $item->answer_yn; ?></td>
			<td><?php echo $item->unit_of_measure_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/answers/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/answers/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/answers/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Answers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/answers/create', 'Add new Answer', array('class' => 'btn btn-success')); ?>

</p>
