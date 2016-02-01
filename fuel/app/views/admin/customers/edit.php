<h2>Editing Customer</h2>
<br>

<?php echo render('admin/customers/_form'); ?>
<p>
	<?php echo Html::anchor('admin/customers/view/'.$customer->id, 'View'); ?> |
	<?php echo Html::anchor('admin/customers', 'Back'); ?></p>
