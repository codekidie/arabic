<h2>Viewing #<?php echo $question->id; ?></h2>

<p>
	<strong>Question name:</strong>
	<?php echo $question->question_name; ?></p>
<p>
	<strong>Question subtext:</strong>
	<?php echo $question->question_subtext; ?></p>
<p>
	<strong>Answer:</strong>
	<?php echo $question->answer; ?></p>
<p>
	<strong>Option group id:</strong>
	<?php echo $question->option_group_id; ?></p>
<p>
	<strong>Allow multiple option answers:</strong>
	<?php echo $question->allow_multiple_option_answers; ?></p>

<?php echo Html::anchor('admin/questions/edit/'.$question->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/questions', 'Back'); ?>