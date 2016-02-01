<?php

namespace Fuel\Migrations;

class Create_product_subcategories
{
	public function up()
	{
		\DBUtil::create_table('product_subcategories', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'product_id' => array('constraint' => 11, 'type' => 'int'),
			'orientation' => array('constraint' => 11, 'type' => 'int'),
			'picture' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('product_subcategories');
	}
}