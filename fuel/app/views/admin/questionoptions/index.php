<h2>Listing Questionoptions</h2>
<br>
<?php if ($questionoptions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Question id</th>
			<th>Option choice id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($questionoptions as $item): ?>		<tr>

			<td><?php echo $item->question_id; ?></td>
			<td><?php echo $item->option_choice_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/questionoptions/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/questionoptions/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/questionoptions/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Questionoptions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/questionoptions/create', 'Add new Questionoption', array('class' => 'btn btn-success')); ?>

</p>
