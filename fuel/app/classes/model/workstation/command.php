<?php
class Model_Workstation_Command extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'command_key',
		'workstation_id',
		'executed',
		'valid_until',
		'group_key',
		'sequence_number',
		'executed_at',
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
		$val->add_field('command_key', 'Command Key', 'required|max_length[255]');
		$val->add_field('workstation_id', 'Workstation Id', 'required|valid_string[numeric]');
		$val->add_field('executed', 'Executed', 'required|valid_string[numeric]');
		$val->add_field('valid_until', 'Valid Until', 'required|max_length[255]');
		$val->add_field('group_key', 'Group Key', 'required|max_length[255]');
		$val->add_field('sequence_number', 'Sequence Number', 'required|valid_string[numeric]');
		$val->add_field('executed_at', 'Executed At', 'required|valid_string[numeric]');

		return $val;
	}

}
