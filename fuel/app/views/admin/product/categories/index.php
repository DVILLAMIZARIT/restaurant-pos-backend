<h2>Listing Product_categories</h2>
<br>
<?php if ($product_categories): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Picture</th>
			<th>Orientation</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($product_categories as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->picture; ?></td>
			<td><?php echo $item->orientation; ?></td>
			<td>
				<?php echo Html::anchor('admin/product/categories/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/product/categories/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/product/categories/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Product_categories.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/product/categories/create', 'Add new Product category', array('class' => 'btn btn-success')); ?>

</p>
