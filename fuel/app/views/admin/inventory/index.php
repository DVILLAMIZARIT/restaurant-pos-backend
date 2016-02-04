<p>
	<?php echo Html::anchor('admin/inventory/create', 'New Inventory', array('class' => 'btn btn-success')); ?>

</p>

<?php if ($inventories): ?>
<?php echo $pagination->render(); ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Description</th>
			<th>Barcode</th>
			<th>Short code</th>
			<th>Warning level</th>
                        <th style="width: 150px;"></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($inventories as $item): ?>		<tr>

			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->barcode; ?></td>
			<td><?php echo $item->short_code; ?></td>
			<td><?php echo $item->warning_level; ?></td>
			<td nowrap>
				<?php echo Html::anchor('admin/inventory/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/inventory/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/inventory/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Inventories.</p>

<?php endif; ?>
<p></p>