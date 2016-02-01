<h2>Listing Product_subcategories</h2>
<br>
<?php if ($product_subcategories): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Product id</th>
			<th>Orientation</th>
			<th>Picture</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($product_subcategories as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->product_id; ?></td>
			<td><?php echo $item->orientation; ?></td>
			<td><?php echo $item->picture; ?></td>
			<td>
				<?php echo Html::anchor('admin/product/subcategories/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/product/subcategories/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/product/subcategories/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Product_subcategories.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/product/subcategories/create', 'Add new Product subcategory', array('class' => 'btn btn-success')); ?>

</p>
