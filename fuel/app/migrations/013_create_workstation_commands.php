<?php

namespace Fuel\Migrations;

class Create_workstation_commands
{
	public function up()
	{
		\DBUtil::create_table('workstation_commands', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'command_key' => array('constraint' => 255, 'type' => 'varchar'),
			'workstation_id' => array('constraint' => 11, 'type' => 'int'),
			'executed' => array('constraint' => 11, 'type' => 'int'),
			'valid_until' => array('constraint' => 255, 'type' => 'varchar'),
			'group_key' => array('constraint' => 255, 'type' => 'varchar'),
			'sequence_number' => array('constraint' => 11, 'type' => 'int'),
			'executed_at' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('workstation_commands');
	}
}