<?php

namespace Fuel\Migrations;

class Create_workstation_command_types
{
	public function up()
	{
		\DBUtil::create_table('workstation_command_types', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'command_key' => array('constraint' => 255, 'type' => 'varchar'),
			'command_description' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('workstation_command_types');
	}
}