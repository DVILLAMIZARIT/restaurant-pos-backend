<h2>Viewing #<?php echo $product_category->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $product_category->name; ?></p>
<p>
	<strong>Picture:</strong>
	<?php echo $product_category->picture; ?></p>
<p>
	<strong>Orientation:</strong>
	<?php echo $product_category->orientation; ?></p>

<?php echo Html::anchor('admin/product/categories/edit/'.$product_category->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/product/categories', 'Back'); ?>