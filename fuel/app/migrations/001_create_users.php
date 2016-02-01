<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'username' => array('constraint' => 255, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'last_login' => array('constraint' => 11, 'type' => 'int'),
			'login_hash' => array('constraint' => 11, 'type' => 'int'),
			'group' => array('constraint' => 11, 'type' => 'int'),
			'profile_fields' => array('type' => 'text'),
			'guid' => array('constraint' => 255, 'type' => 'varchar'),
			'shop_guid' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'id_number' => array('constraint' => 255, 'type' => 'varchar'),
			'employee_number' => array('constraint' => 255, 'type' => 'varchar'),
			'date_of_birth' => array('constraint' => 255, 'type' => 'varchar'),
			'user_type_id' => array('constraint' => 11, 'type' => 'int'),
			'access_options' => array('type' => 'text'),
			'phone' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}