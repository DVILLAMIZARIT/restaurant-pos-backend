<h2>Viewing #<?php echo $workstation_command->id; ?></h2>

<p>
	<strong>Command key:</strong>
	<?php echo $workstation_command->command_key; ?></p>
<p>
	<strong>Workstation id:</strong>
	<?php echo $workstation_command->workstation_id; ?></p>
<p>
	<strong>Executed:</strong>
	<?php echo $workstation_command->executed; ?></p>
<p>
	<strong>Valid until:</strong>
	<?php echo $workstation_command->valid_until; ?></p>
<p>
	<strong>Group key:</strong>
	<?php echo $workstation_command->group_key; ?></p>
<p>
	<strong>Sequence number:</strong>
	<?php echo $workstation_command->sequence_number; ?></p>
<p>
	<strong>Executed at:</strong>
	<?php echo $workstation_command->executed_at; ?></p>

<?php echo Html::anchor('admin/workstation/commands/edit/'.$workstation_command->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/workstation/commands', 'Back'); ?>