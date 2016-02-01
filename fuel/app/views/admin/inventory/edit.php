<h2>Editing Inventory</h2>
<br>

<?php echo render('admin/inventory/_form'); ?>
<p>
	<?php echo Html::anchor('admin/inventory/view/'.$inventory->id, 'View'); ?> |
	<?php echo Html::anchor('admin/inventory', 'Back'); ?></p>
