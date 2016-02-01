<?php

namespace Fuel\Migrations;

class Create_currencies
{
	public function up()
	{
		\DBUtil::create_table('currencies', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'symbol' => array('constraint' => 255, 'type' => 'varchar'),
			'country' => array('constraint' => 255, 'type' => 'varchar'),
			'is_default' => array('constraint' => 11, 'type' => 'int'),
			'exchange_rate' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('currencies');
	}
}