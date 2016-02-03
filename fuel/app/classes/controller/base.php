<?php

class Controller_Base extends Controller_Template
{
	public function before()
	{
		parent::before();

		$this->current_user = null;

		foreach (\Auth::verified() as $driver)
		{
			if (($id = $driver->get_user_id()) !== false)
			{
				$this->current_user = Model\Auth_User::find($id[1]);
			}
			break;
		}

		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);
	}
        
        protected function get_groups()
        {
            return array(
                '100' => 'Administators',
                '50' => 'Supervisors',
                '30' => 'Cashiers',
                '20' => 'Kitchen Staff',
            );
        }
        
        protected function get_group($group_id)
        {
            $groups = $this->get_groups();
            return isset($groups[$group_id]) ? $groups[$group_id] : '';
        }
}
