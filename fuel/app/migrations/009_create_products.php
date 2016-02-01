<?php

namespace Fuel\Migrations;

class Create_products
{
	public function up()
	{
		\DBUtil::create_table('products', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'barcode' => array('constraint' => 255, 'type' => 'varchar'),
			'short_code' => array('constraint' => 255, 'type' => 'varchar'),
			'cost_price' => array('type' => 'float'),
			'retail_price' => array('type' => 'float'),
			'is_taxable' => array('constraint' => 11, 'type' => 'int'),
			'discontinued' => array('constraint' => 11, 'type' => 'int'),
			'picture' => array('type' => 'text'),
			'product_details' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('products');
	}
}