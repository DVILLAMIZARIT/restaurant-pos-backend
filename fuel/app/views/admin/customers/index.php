<h2>Listing Customers</h2>
<br>
<?php if ($customers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Description</th>
			<th>Contact person</th>
			<th>Phone</th>
			<th>Email</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($customers as $item): ?>		<tr>

			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->contact_person; ?></td>
			<td><?php echo $item->phone; ?></td>
			<td><?php echo $item->email; ?></td>
			<td>
				<?php echo Html::anchor('admin/customers/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/customers/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/customers/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Customers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/customers/create', 'Add new Customer', array('class' => 'btn btn-success')); ?>

</p>
