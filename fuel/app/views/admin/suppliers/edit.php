<h2>Editing Supplier</h2>
<br>

<?php echo render('admin/suppliers/_form'); ?>
<p>
	<?php echo Html::anchor('admin/suppliers/view/'.$supplier->id, 'View'); ?> |
	<?php echo Html::anchor('admin/suppliers', 'Back'); ?></p>
