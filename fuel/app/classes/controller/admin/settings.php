<?php
class Controller_Admin_Settings extends Controller_Admin
{

	public function action_index()
	{
                $config = \Fuel\Core\Config::get('pagination');
                $pagination = \Fuel\Core\Pagination::forge('settings', $config);
                $pagination->total_items = Model_Setting::count();
                
		$settings = Model_Setting::find('all', array(
                    'order_by' => array(
                        array('setting_title', 'asc')
                    ),
                    'limit' => $pagination->per_page,
                    'offset' => $pagination->offset,
                ));
                
                $data_types = Model_Setting_Data_Type::find('all', array(
                    'order_by' => array(
                        array('name', 'asc')
                    )
                ));
                
		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/index', array(
                    'pagination' => $pagination,
                    'settings' => $settings,
                    'data_types' => $data_types,
                ));

	}

	public function action_view($id = null)
	{
		if ($setting = Model_Setting::find($id))
                {
                    $this->template->title = "Setting";
                    $this->template->content = View::forge('admin/settings/view', array('setting' => $setting));
                }
                else
                {
                    Fuel\Core\Session::set_flash('error', 'Cannot find the specified setting');
                    Fuel\Core\Response::redirect('admin/settings');
                }
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Setting::validate('create');

			if ($val->run())
			{
				$setting = Model_Setting::forge(array(
					'setting_key' => Input::post('setting_key'),
					'setting_title' => Input::post('setting_title'),
					'setting_value' => Input::post('setting_value'),
					'setting_data_type_id' => Input::post('setting_data_type_id'),
				));

				if ($setting and $setting->save())
				{
					Session::set_flash('success', e('Added setting #'.$setting->id.'.'));

					Response::redirect('admin/settings/view/'.$setting->id);
				}

				else
				{
					Session::set_flash('error', e('Could not save setting.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

                $this->template->set_global('data_types', Model_Setting_Data_Type::find('all', array(
                    'order_by' => array(
                        array('name', 'asc')
                    )
                )));
                
		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/create');

	}

	public function action_edit($id = null)
	{
		$setting = Model_Setting::find($id);
		$val = Model_Setting::validate('edit');

		if ($val->run())
		{
			$setting->setting_key = Input::post('setting_key');
			$setting->setting_title = Input::post('setting_title');
			$setting->setting_value = Input::post('setting_value');
			$setting->setting_data_type_id = Input::post('setting_data_type_id');

			if ($setting->save())
			{
				Session::set_flash('success', e('Updated setting #' . $id));

				Response::redirect('admin/settings/view/'.$setting->id);
			}

			else
			{
				Session::set_flash('error', e('Could not update setting #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$setting->setting_key = $val->validated('setting_key');
				$setting->setting_title = $val->validated('setting_title');
				$setting->setting_value = $val->validated('setting_value');
				$setting->setting_data_type_id = $val->validated('setting_data_type_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('setting', $setting, false);
		}

                $this->template->set_global('data_types', Model_Setting_Data_Type::find('all', array(
                    'order_by' => array(
                        array('name', 'asc')
                    )
                )));
                
		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/edit');

	}

	public function action_delete($id = null)
	{
		if ($setting = Model_Setting::find($id))
		{
			$setting->delete();

			Session::set_flash('success', e('Deleted setting #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete setting #'.$id));
		}

		Response::redirect('admin/settings');

	}

}
