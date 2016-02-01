<h2>Editing Product_category</h2>
<br>

<?php echo render('admin/product/categories/_form'); ?>
<p>
	<?php echo Html::anchor('admin/product/categories/view/'.$product_category->id, 'View'); ?> |
	<?php echo Html::anchor('admin/product/categories', 'Back'); ?></p>
