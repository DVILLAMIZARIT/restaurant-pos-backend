<h2>Viewing #<?php echo $workstation->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $workstation->name; ?></p>
<p>
	<strong>Pc name:</strong>
	<?php echo $workstation->pc_name; ?></p>
<p>
	<strong>Processor key:</strong>
	<?php echo $workstation->processor_key; ?></p>
<p>
	<strong>Image layout:</strong>
	<?php echo $workstation->image_layout; ?></p>
<p>
	<strong>Location id:</strong>
	<?php echo $workstation->location_id; ?></p>

<?php echo Html::anchor('admin/workstations/edit/'.$workstation->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/workstations', 'Back'); ?>