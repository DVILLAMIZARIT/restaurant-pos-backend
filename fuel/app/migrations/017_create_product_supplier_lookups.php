<?php

namespace Fuel\Migrations;

class Create_product_supplier_lookups
{
	public function up()
	{
		\DBUtil::create_table('product_supplier_lookups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'product_id' => array('constraint' => 11, 'type' => 'int'),
			'supplier_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('product_supplier_lookups');
	}
}