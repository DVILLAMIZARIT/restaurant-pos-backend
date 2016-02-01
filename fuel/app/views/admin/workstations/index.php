<h2>Listing Workstations</h2>
<br>
<?php if ($workstations): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Pc name</th>
			<th>Processor key</th>
			<th>Image layout</th>
			<th>Location id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($workstations as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->pc_name; ?></td>
			<td><?php echo $item->processor_key; ?></td>
			<td><?php echo $item->image_layout; ?></td>
			<td><?php echo $item->location_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/workstations/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/workstations/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/workstations/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Workstations.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/workstations/create', 'Add new Workstation', array('class' => 'btn btn-success')); ?>

</p>
