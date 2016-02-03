<p>
	<?php echo Html::anchor('admin/suppliers/create', 'New Supplier', array('class' => 'btn btn-success')); ?>
</p>
<?php if ($suppliers): ?>
<?php echo $pagination->render(); ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Description</th>
			<th>Contact person</th>
			<th>Phone</th>
			<th>Email</th>
                        <th style="width: 150px;"></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($suppliers as $item): ?>		<tr>

			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->contact_person; ?></td>
                        <td><?php echo Fuel\Core\Num::format_phone($item->phone); ?></td>
			<td><?php echo $item->email; ?></td>
			<td nowrap>
				<?php echo Html::anchor('admin/suppliers/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/suppliers/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/suppliers/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Suppliers.</p>

<?php endif; ?>
<p></p>
