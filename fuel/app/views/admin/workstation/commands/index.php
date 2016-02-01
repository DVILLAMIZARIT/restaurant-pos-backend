<h2>Listing Workstation_commands</h2>
<br>
<?php if ($workstation_commands): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Command key</th>
			<th>Workstation id</th>
			<th>Executed</th>
			<th>Valid until</th>
			<th>Group key</th>
			<th>Sequence number</th>
			<th>Executed at</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($workstation_commands as $item): ?>		<tr>

			<td><?php echo $item->command_key; ?></td>
			<td><?php echo $item->workstation_id; ?></td>
			<td><?php echo $item->executed; ?></td>
			<td><?php echo $item->valid_until; ?></td>
			<td><?php echo $item->group_key; ?></td>
			<td><?php echo $item->sequence_number; ?></td>
			<td><?php echo $item->executed_at; ?></td>
			<td>
				<?php echo Html::anchor('admin/workstation/commands/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/workstation/commands/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/workstation/commands/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Workstation_commands.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/workstation/commands/create', 'Add new Workstation command', array('class' => 'btn btn-success')); ?>

</p>
