<?php

namespace Fuel\Migrations;

class Create_suppliers
{
	public function up()
	{
		\DBUtil::create_table('suppliers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'contact_person' => array('constraint' => 255, 'type' => 'varchar'),
			'phone' => array('constraint' => 255, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('suppliers');
	}
}