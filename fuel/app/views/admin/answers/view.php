<h2>Viewing #<?php echo $answer->id; ?></h2>

<p>
	<strong>User id:</strong>
	<?php echo $answer->user_id; ?></p>
<p>
	<strong>Question option id:</strong>
	<?php echo $answer->question_option_id; ?></p>
<p>
	<strong>Answer numeric:</strong>
	<?php echo $answer->answer_numeric; ?></p>
<p>
	<strong>Answer text:</strong>
	<?php echo $answer->answer_text; ?></p>
<p>
	<strong>Answer yn:</strong>
	<?php echo $answer->answer_yn; ?></p>
<p>
	<strong>Unit of measure id:</strong>
	<?php echo $answer->unit_of_measure_id; ?></p>

<?php echo Html::anchor('admin/answers/edit/'.$answer->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/answers', 'Back'); ?>