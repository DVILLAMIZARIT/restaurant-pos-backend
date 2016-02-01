<?php
class Model_Supplier extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'description',
		'contact_person',
		'phone',
		'email',
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
		$val->add_field('contact_person', 'Contact Person', 'required|max_length[255]');
		$val->add_field('phone', 'Phone', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');

		return $val;
	}

}
