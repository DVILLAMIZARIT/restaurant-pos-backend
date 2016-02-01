<h2>Listing Products</h2>
<br>
<?php if ($products): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Description</th>
			<th>Barcode</th>
			<th>Short code</th>
			<th>Cost price</th>
			<th>Retail price</th>
			<th>Is taxable</th>
			<th>Discontinued</th>
			<th>Picture</th>
			<th>Product details</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($products as $item): ?>		<tr>

			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->barcode; ?></td>
			<td><?php echo $item->short_code; ?></td>
			<td><?php echo $item->cost_price; ?></td>
			<td><?php echo $item->retail_price; ?></td>
			<td><?php echo $item->is_taxable; ?></td>
			<td><?php echo $item->discontinued; ?></td>
			<td><?php echo $item->picture; ?></td>
			<td><?php echo $item->product_details; ?></td>
			<td>
				<?php echo Html::anchor('admin/products/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/products/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/products/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Products.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/products/create', 'Add new Product', array('class' => 'btn btn-success')); ?>

</p>
