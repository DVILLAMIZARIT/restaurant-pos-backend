<?php
class Model_Workstation extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'pc_name',
		'processor_key',
		'image_layout',
		'location_id',
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
		$val->add_field('pc_name', 'Pc Name', 'required|max_length[255]');
		$val->add_field('processor_key', 'Processor Key', 'required|max_length[255]');
		$val->add_field('image_layout', 'Image Layout', 'required|valid_string[numeric]');
		$val->add_field('location_id', 'Location Id', 'required|valid_string[numeric]');

		return $val;
	}

}
