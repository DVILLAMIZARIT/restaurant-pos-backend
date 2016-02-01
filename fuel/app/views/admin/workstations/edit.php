<h2>Editing Workstation</h2>
<br>

<?php echo render('admin/workstations/_form'); ?>
<p>
	<?php echo Html::anchor('admin/workstations/view/'.$workstation->id, 'View'); ?> |
	<?php echo Html::anchor('admin/workstations', 'Back'); ?></p>
