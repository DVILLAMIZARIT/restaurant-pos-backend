<h2>Viewing #<?php echo $customer->id; ?></h2>

<p>
	<strong>Description:</strong>
	<?php echo $customer->description; ?></p>
<p>
	<strong>Contact person:</strong>
	<?php echo $customer->contact_person; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $customer->phone; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $customer->email; ?></p>

<?php echo Html::anchor('admin/customers/edit/'.$customer->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/customers', 'Back'); ?>