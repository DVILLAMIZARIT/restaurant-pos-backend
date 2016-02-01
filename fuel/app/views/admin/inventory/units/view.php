<h2>Viewing #<?php echo $inventory_unit->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $inventory_unit->name; ?></p>

<?php echo Html::anchor('admin/inventory/units/edit/'.$inventory_unit->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/inventory/units', 'Back'); ?>