<?php
class Model_Product extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'description',
		'barcode',
		'short_code',
		'cost_price',
		'retail_price',
		'is_taxable',
		'discontinued',
		'picture',
		'product_details',
                'composition',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('description', 'Description', 'required|max_length[255]');
		$val->add_field('barcode', 'Barcode', 'required|max_length[255]');
		$val->add_field('short_code', 'Short Code', 'required|max_length[255]');
		$val->add_field('cost_price', 'Cost Price', 'required');
		$val->add_field('retail_price', 'Retail Price', 'required');
		$val->add_field('is_taxable', 'Is Taxable', 'required|valid_string[numeric]');
		$val->add_field('discontinued', 'Discontinued', 'required|valid_string[numeric]');
		$val->add_field('picture', 'Picture', 'required');
		$val->add_field('product_details', 'Product Details', 'required');

		return $val;
	}

}
