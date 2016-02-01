<?php
class Model_Currency extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'symbol',
		'country',
		'is_default',
		'exchange_rate',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('symbol', 'Symbol', 'required|max_length[255]');
		$val->add_field('country', 'Country', 'required|max_length[255]');
		$val->add_field('is_default', 'Is Default', 'required|valid_string[numeric]');
		$val->add_field('exchange_rate', 'Exchange Rate', 'required|max_length[255]');

		return $val;
	}

}
