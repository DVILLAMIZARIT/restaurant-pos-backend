<h2>Viewing #<?php echo $product_subcategory->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $product_subcategory->name; ?></p>
<p>
	<strong>Product id:</strong>
	<?php echo $product_subcategory->product_id; ?></p>
<p>
	<strong>Orientation:</strong>
	<?php echo $product_subcategory->orientation; ?></p>
<p>
	<strong>Picture:</strong>
	<?php echo $product_subcategory->picture; ?></p>

<?php echo Html::anchor('admin/product/subcategories/edit/'.$product_subcategory->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/product/subcategories', 'Back'); ?>