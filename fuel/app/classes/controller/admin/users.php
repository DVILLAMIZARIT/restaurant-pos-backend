<?php
class Controller_Admin_Users extends Controller_Admin
{

	public function action_index()
	{
                $config = \Fuel\Core\Config::get('pagination');
                $pagination = \Fuel\Core\Pagination::forge('admin.users', $config);
                $pagination->total_items = Model_User::count();
                
                $data['pagination'] = $pagination;
		$data['users'] = Model_User::find('all', array(
                    'order_by' => array(
                        array('description', 'asc')
                    ),
                    'limit' => $pagination->per_page,
                    'offset' => $pagination->offset,
                ));
                
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/index', $data);

	}

	public function action_view($id = null)
	{
		if ($user = Model_User::find($id))
                {
                    $this->template->title = "User";
                    $this->template->content = View::forge('admin/users/view', array(
                        'user' => $user,
                    ));
                }
                else
                {
                    Fuel\Core\Session::set_flash('error', 'Cannot find the selected user');
                    Fuel\Core\Response::redirect_back('admin/users');
                }

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'username' => Input::post('username'),
					'password' => Input::post('password'),
					'email' => Input::post('email'),
					'last_login' => Input::post('last_login'),
					'login_hash' => Input::post('login_hash'),
					'group' => Input::post('group'),
					'profile_fields' => Input::post('profile_fields'),
					'guid' => Input::post('guid'),
					'shop_guid' => Input::post('shop_guid'),
					'description' => Input::post('description'),
					'id_number' => Input::post('id_number'),
					'employee_number' => Input::post('employee_number'),
					'date_of_birth' => Input::post('date_of_birth'),
					'user_type_id' => Input::post('user_type_id'),
					'access_options' => Input::post('access_options'),
					'phone' => Input::post('phone'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', e('Added user #'.$user->id.'.'));

					Response::redirect('admin/users');
				}

				else
				{
					Session::set_flash('error', e('Could not save user.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/create');

	}

	public function action_edit($id = null)
	{
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->username = Input::post('username');
			$user->password = Input::post('password');
			$user->email = Input::post('email');
			$user->last_login = Input::post('last_login');
			$user->login_hash = Input::post('login_hash');
			$user->group = Input::post('group');
			$user->profile_fields = Input::post('profile_fields');
			$user->guid = Input::post('guid');
			$user->shop_guid = Input::post('shop_guid');
			$user->description = Input::post('description');
			$user->id_number = Input::post('id_number');
			$user->employee_number = Input::post('employee_number');
			$user->date_of_birth = Input::post('date_of_birth');
			$user->user_type_id = Input::post('user_type_id');
			$user->access_options = Input::post('access_options');
			$user->phone = Input::post('phone');

			if ($user->save())
			{
				Session::set_flash('success', e('Updated user #' . $id));

				Response::redirect('admin/users');
			}

			else
			{
				Session::set_flash('error', e('Could not update user #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->username = $val->validated('username');
				$user->password = $val->validated('password');
				$user->email = $val->validated('email');
				$user->last_login = $val->validated('last_login');
				$user->login_hash = $val->validated('login_hash');
				$user->group = $val->validated('group');
				$user->profile_fields = $val->validated('profile_fields');
				$user->guid = $val->validated('guid');
				$user->shop_guid = $val->validated('shop_guid');
				$user->description = $val->validated('description');
				$user->id_number = $val->validated('id_number');
				$user->employee_number = $val->validated('employee_number');
				$user->date_of_birth = $val->validated('date_of_birth');
				$user->user_type_id = $val->validated('user_type_id');
				$user->access_options = $val->validated('access_options');
				$user->phone = $val->validated('phone');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/users/edit');

	}

	public function action_delete($id = null)
	{
		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', e('Deleted user #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete user #'.$id));
		}

		Response::redirect('admin/users');

	}

}
