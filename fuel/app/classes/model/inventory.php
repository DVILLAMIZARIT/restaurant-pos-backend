<?php
class Model_Inventory extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'description',
		'barcode',
		'short_code',
		'inventory_units_id',
		'warning_level',
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
		$val->add_field('inventory_units_id', 'Inventory Units Id', 'required|valid_string[numeric]');
		$val->add_field('warning_level', 'Warning Level', 'required|valid_string[numeric]');

		return $val;
	}

}
