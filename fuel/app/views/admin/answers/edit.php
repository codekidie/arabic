<h2>Editing Answer</h2>
<br>

<?php echo render('admin/answers/_form'); ?>
<p>
	<?php echo Html::anchor('admin/answers/view/'.$answer->id, 'View'); ?> |
	<?php echo Html::anchor('admin/answers', 'Back'); ?></p>
