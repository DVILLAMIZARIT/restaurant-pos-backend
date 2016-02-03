<?php if ($inventory_units): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
                        <th style="width: 150px;"></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($inventory_units as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td nowrap>
				<?php echo Html::anchor('admin/inventory/units/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/inventory/units/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/inventory/units/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Inventory_units.</p>

<?php endif; ?>
<p>
    <?php echo Html::anchor('admin/inventory/units/create', 'Add new Inventory unit', array('class' => 'btn btn-success')); ?>
</p>