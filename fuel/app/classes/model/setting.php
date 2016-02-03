<?php
class Model_Setting extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'setting_key',
		'setting_title',
		'setting_value',
		'setting_data_type_id',
		'created_at',
		'updated_at',
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
        
        protected static $_belongs_to = array(
            'data_type' => array(
                'model_to' => 'Model_Setting_Data_Type',
                'key_from' => 'setting_data_type_id',
            )
        );

        public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('setting_key', 'Setting Key', 'required|max_length[255]');
		$val->add_field('setting_title', 'Setting Title', 'required|max_length[255]');
		$val->add_field('setting_data_type_id', 'Setting Data Type', 'required|valid_string[numeric]');

		return $val;
	}
        
        public function get_data_type()
        {
            return !is_null($this->data_type) ? $this->data_type : Model_Setting_Data_Type::forge(array('id' => 0));
        }
}
