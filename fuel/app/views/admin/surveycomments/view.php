<h2>Viewing #<?php echo $surveycomment->id; ?></h2>

<p>
	<strong>User id:</strong>
	<?php echo $surveycomment->user_id; ?></p>
<p>
	<strong>Survey header id:</strong>
	<?php echo $surveycomment->survey_header_id; ?></p>
<p>
	<strong>Comments:</strong>
	<?php echo $surveycomment->comments; ?></p>

<?php echo Html::anchor('admin/surveycomments/edit/'.$surveycomment->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/surveycomments', 'Back'); ?>