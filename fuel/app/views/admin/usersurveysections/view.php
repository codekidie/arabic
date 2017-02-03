<h2>Viewing #<?php echo $usersurveysection->id; ?></h2>

<p>
	<strong>Userid:</strong>
	<?php echo $usersurveysection->userid; ?></p>
<p>
	<strong>Surveysectionid:</strong>
	<?php echo $usersurveysection->surveysectionid; ?></p>
<p>
	<strong>Completed on:</strong>
	<?php echo $usersurveysection->completed_on; ?></p>

<?php echo Html::anchor('admin/usersurveysections/edit/'.$usersurveysection->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/usersurveysections', 'Back'); ?>