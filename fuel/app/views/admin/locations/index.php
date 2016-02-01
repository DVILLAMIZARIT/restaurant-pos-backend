<h2>Listing Locations</h2>
<br>
<?php if ($locations): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Can sell</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($locations as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->can_sell; ?></td>
			<td>
				<?php echo Html::anchor('admin/locations/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/locations/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/locations/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Locations.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/locations/create', 'Add new Location', array('class' => 'btn btn-success')); ?>

</p>
