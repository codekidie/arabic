<h2>Viewing #<?php echo $questionoption->id; ?></h2>

<p>
	<strong>Question id:</strong>
	<?php echo $questionoption->question_id; ?></p>
<p>
	<strong>Option choice id:</strong>
	<?php echo $questionoption->option_choice_id; ?></p>

<?php echo Html::anchor('admin/questionoptions/edit/'.$questionoption->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/questionoptions', 'Back'); ?>