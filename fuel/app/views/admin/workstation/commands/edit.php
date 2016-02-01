<h2>Editing Workstation_command</h2>
<br>

<?php echo render('admin/workstation/commands/_form'); ?>
<p>
	<?php echo Html::anchor('admin/workstation/commands/view/'.$workstation_command->id, 'View'); ?> |
	<?php echo Html::anchor('admin/workstation/commands', 'Back'); ?></p>
