<?php
class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'email',
		'last_login',
		'login_hash',
		'group',
		'profile_fields',
		'guid',
		'shop_guid',
		'description',
		'id_number',
		'employee_number',
		'date_of_birth',
		'user_type_id',
		'access_options',
		'phone',
		'created_at',
		'updated_at',
	);
        
        protected static $_belongs_to = array(
            'user_type' => array(
                'model_to' => 'Model_User_Type',
                'key_from' => 'user_type_id',
            )
        );

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('username', 'Username', 'required|max_length[255]');
//		$val->add_field('password', 'Password', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
//		$val->add_field('last_login', 'Last Login', 'required|valid_string[numeric]');
//		$val->add_field('login_hash', 'Login Hash', 'required|valid_string[numeric]');
		$val->add_field('group', 'Group', 'required|valid_string[numeric]');
//		$val->add_field('profile_fields', 'Profile Fields', 'required');
//		$val->add_field('guid', 'Guid', 'required|max_length[255]');
//		$val->add_field('shop_guid', 'Shop Guid', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required|max_length[255]');
//		$val->add_field('id_number', 'Id Number', 'required|max_length[255]');
//		$val->add_field('employee_number', 'Employee Number', 'required|max_length[255]');
//		$val->add_field('date_of_birth', 'Date Of Birth', 'required|max_length[255]');
		$val->add_field('user_type_id', 'User Type Id', 'required|valid_string[numeric]');
//		$val->add_field('access_options', 'Access Options', 'required');
//		$val->add_field('phone', 'Phone', 'required|max_length[255]');

		return $val;
	}
        
        public function get_user_type()
        {
            return !is_null($this->user_type) ? $this->user_type : Model_User_Type::forge(array('id' => 0));
        }
        
}
