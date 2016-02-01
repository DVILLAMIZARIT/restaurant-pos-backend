<?php
class Controller_Admin_User_Types extends Controller_Admin
{

	public function action_index()
	{
		$data['user_types'] = Model_User_Type::find('all');
		$this->template->title = "User_types";
		$this->template->content = View::forge('admin/user/types/index', $data);

	}

	public function action_view($id = null)
	{
		$data['user_type'] = Model_User_Type::find($id);

		$this->template->title = "User_type";
		$this->template->content = View::forge('admin/user/types/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User_Type::validate('create');

			if ($val->run())
			{
				$user_type = Model_User_Type::forge(array(
					'name' => Input::post('name'),
					'group' => Input::post('group'),
				));

				if ($user_type and $user_type->save())
				{
					Session::set_flash('success', e('Added user_type #'.$user_type->id.'.'));

					Response::redirect('admin/user/types');
				}

				else
				{
					Session::set_flash('error', e('Could not save user_type.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "User_Types";
		$this->template->content = View::forge('admin/user/types/create');

	}

	public function action_edit($id = null)
	{
		$user_type = Model_User_Type::find($id);
		$val = Model_User_Type::validate('edit');

		if ($val->run())
		{
			$user_type->name = Input::post('name');
			$user_type->group = Input::post('group');

			if ($user_type->save())
			{
				Session::set_flash('success', e('Updated user_type #' . $id));

				Response::redirect('admin/user/types');
			}

			else
			{
				Session::set_flash('error', e('Could not update user_type #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user_type->name = $val->validated('name');
				$user_type->group = $val->validated('group');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user_type', $user_type, false);
		}

		$this->template->title = "User_types";
		$this->template->content = View::forge('admin/user/types/edit');

	}

	public function action_delete($id = null)
	{
		if ($user_type = Model_User_Type::find($id))
		{
			$user_type->delete();

			Session::set_flash('success', e('Deleted user_type #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete user_type #'.$id));
		}

		Response::redirect('admin/user/types');

	}

}
