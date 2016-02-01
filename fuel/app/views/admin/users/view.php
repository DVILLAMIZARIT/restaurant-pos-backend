<h2>Viewing #<?php echo $user->id; ?></h2>

<p>
	<strong>Username:</strong>
	<?php echo $user->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $user->password; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?></p>
<p>
	<strong>Last login:</strong>
	<?php echo $user->last_login; ?></p>
<p>
	<strong>Login hash:</strong>
	<?php echo $user->login_hash; ?></p>
<p>
	<strong>Group:</strong>
	<?php echo $user->group; ?></p>
<p>
	<strong>Profile fields:</strong>
	<?php echo $user->profile_fields; ?></p>
<p>
	<strong>Guid:</strong>
	<?php echo $user->guid; ?></p>
<p>
	<strong>Shop guid:</strong>
	<?php echo $user->shop_guid; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $user->description; ?></p>
<p>
	<strong>Id number:</strong>
	<?php echo $user->id_number; ?></p>
<p>
	<strong>Employee number:</strong>
	<?php echo $user->employee_number; ?></p>
<p>
	<strong>Date of birth:</strong>
	<?php echo $user->date_of_birth; ?></p>
<p>
	<strong>User type id:</strong>
	<?php echo $user->user_type_id; ?></p>
<p>
	<strong>Access options:</strong>
	<?php echo $user->access_options; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $user->phone; ?></p>

<?php echo Html::anchor('admin/users/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/users', 'Back'); ?>