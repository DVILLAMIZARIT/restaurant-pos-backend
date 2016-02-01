<h2>Viewing #<?php echo $supplier->id; ?></h2>

<p>
	<strong>Description:</strong>
	<?php echo $supplier->description; ?></p>
<p>
	<strong>Contact person:</strong>
	<?php echo $supplier->contact_person; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $supplier->phone; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $supplier->email; ?></p>

<?php echo Html::anchor('admin/suppliers/edit/'.$supplier->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/suppliers', 'Back'); ?>