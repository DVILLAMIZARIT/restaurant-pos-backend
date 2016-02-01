<h2>Editing User_type</h2>
<br>

<?php echo render('admin/user/types/_form'); ?>
<p>
	<?php echo Html::anchor('admin/user/types/view/'.$user_type->id, 'View'); ?> |
	<?php echo Html::anchor('admin/user/types', 'Back'); ?></p>
