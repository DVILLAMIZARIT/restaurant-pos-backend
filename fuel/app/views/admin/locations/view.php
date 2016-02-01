<h2>Viewing #<?php echo $location->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $location->name; ?></p>
<p>
	<strong>Can sell:</strong>
	<?php echo $location->can_sell; ?></p>

<?php echo Html::anchor('admin/locations/edit/'.$location->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/locations', 'Back'); ?>