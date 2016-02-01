<?php
class Model_Setting extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'setting_key',
		'setting_title',
		'setting_value',
		'setting_data_type',
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
		$val->add_field('setting_key', 'Setting Key', 'required|max_length[255]');
		$val->add_field('setting_title', 'Setting Title', 'required|max_length[255]');
		$val->add_field('setting_value', 'Setting Value', 'required');
		$val->add_field('setting_data_type', 'Setting Data Type', 'required|max_length[255]');

		return $val;
	}

}
