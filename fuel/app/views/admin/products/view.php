<h2>Viewing #<?php echo $product->id; ?></h2>

<p>
	<strong>Description:</strong>
	<?php echo $product->description; ?></p>
<p>
	<strong>Barcode:</strong>
	<?php echo $product->barcode; ?></p>
<p>
	<strong>Short code:</strong>
	<?php echo $product->short_code; ?></p>
<p>
	<strong>Cost price:</strong>
	<?php echo $product->cost_price; ?></p>
<p>
	<strong>Retail price:</strong>
	<?php echo $product->retail_price; ?></p>
<p>
	<strong>Is taxable:</strong>
	<?php echo $product->is_taxable; ?></p>
<p>
	<strong>Discontinued:</strong>
	<?php echo $product->discontinued; ?></p>
<p>
	<strong>Picture:</strong>
	<?php echo $product->picture; ?></p>
<p>
	<strong>Product details:</strong>
	<?php echo $product->product_details; ?></p>

<?php echo Html::anchor('admin/products/edit/'.$product->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/products', 'Back'); ?>