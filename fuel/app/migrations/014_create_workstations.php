<?php

namespace Fuel\Migrations;

class Create_workstations
{
	public function up()
	{
		\DBUtil::create_table('workstations', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'pc_name' => array('constraint' => 255, 'type' => 'varchar'),
			'processor_key' => array('constraint' => 255, 'type' => 'varchar'),
			'image_layout' => array('constraint' => 11, 'type' => 'int'),
			'location_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('workstations');
	}
}