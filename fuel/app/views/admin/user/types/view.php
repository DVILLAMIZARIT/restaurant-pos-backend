<h2>Viewing #<?php echo $user_type->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $user_type->name; ?></p>
<p>
	<strong>Group:</strong>
	<?php echo $user_type->group; ?></p>

<?php echo Html::anchor('admin/user/types/edit/'.$user_type->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/user/types', 'Back'); ?>