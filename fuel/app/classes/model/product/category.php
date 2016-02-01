<?php
class Model_Product_Category extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'picture',
		'orientation',
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
		$val->add_field('picture', 'Picture', 'required');
		$val->add_field('orientation', 'Orientation', 'required|valid_string[numeric]');

		return $val;
	}

}
