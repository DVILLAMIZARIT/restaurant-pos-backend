<?php

class Model_Workstation_Command_Type extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'command_key',
		'command_description',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'workstation_command_types';

}
