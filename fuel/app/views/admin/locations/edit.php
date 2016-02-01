<h2>Editing Location</h2>
<br>

<?php echo render('admin/locations/_form'); ?>
<p>
	<?php echo Html::anchor('admin/locations/view/'.$location->id, 'View'); ?> |
	<?php echo Html::anchor('admin/locations', 'Back'); ?></p>
