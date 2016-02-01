<h2>Editing Inventory_unit</h2>
<br>

<?php echo render('admin/inventory/units/_form'); ?>
<p>
	<?php echo Html::anchor('admin/inventory/units/view/'.$inventory_unit->id, 'View'); ?> |
	<?php echo Html::anchor('admin/inventory/units', 'Back'); ?></p>
