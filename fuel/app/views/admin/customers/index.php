<p>
	<?php echo Html::anchor('admin/customers/create', 'New Customer', array('class' => 'btn btn-success')); ?>
</p>

<?php if ($customers): ?>
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
<?php foreach ($customers as $item): ?>		<tr>

			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->contact_person; ?></td>
			<td><?php echo Num::format_phone($item->phone); ?></td>
			<td><?php echo $item->email; ?></td>
			<td nowrap>
				<?php echo Html::anchor('admin/customers/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/customers/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/customers/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	
</tbody>
</table>

<?php else: ?>
<p>No Customers.</p>

<?php endif; ?>
<p></p>