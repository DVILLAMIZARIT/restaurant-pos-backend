<h2>Viewing #<?php echo $inventory->id; ?></h2>

<p>
	<strong>Description:</strong>
	<?php echo $inventory->description; ?></p>
<p>
	<strong>Barcode:</strong>
	<?php echo $inventory->barcode; ?></p>
<p>
	<strong>Short code:</strong>
	<?php echo $inventory->short_code; ?></p>
<p>
	<strong>Inventory units id:</strong>
	<?php echo $inventory->inventory_units_id; ?></p>
<p>
	<strong>Warning level:</strong>
	<?php echo $inventory->warning_level; ?></p>

<?php echo Html::anchor('admin/inventory/edit/'.$inventory->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/inventory', 'Back'); ?>