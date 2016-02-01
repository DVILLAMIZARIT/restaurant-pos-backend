<h2>Editing Product_subcategory</h2>
<br>

<?php echo render('admin/product/subcategories/_form'); ?>
<p>
	<?php echo Html::anchor('admin/product/subcategories/view/'.$product_subcategory->id, 'View'); ?> |
	<?php echo Html::anchor('admin/product/subcategories', 'Back'); ?></p>
