<?php
class Controller_Admin_Workstations extends Controller_Admin
{

	public function action_index()
	{
		$data['workstations'] = Model_Workstation::find('all');
		$this->template->title = "Workstations";
		$this->template->content = View::forge('admin/workstations/index', $data);

	}

	public function action_view($id = null)
	{
		$data['workstation'] = Model_Workstation::find($id);

		$this->template->title = "Workstation";
		$this->template->content = View::forge('admin/workstations/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Workstation::validate('create');

			if ($val->run())
			{
				$workstation = Model_Workstation::forge(array(
					'name' => Input::post('name'),
					'pc_name' => Input::post('pc_name'),
					'processor_key' => Input::post('processor_key'),
					'image_layout' => Input::post('image_layout'),
					'location_id' => Input::post('location_id'),
				));

				if ($workstation and $workstation->save())
				{
					Session::set_flash('success', e('Added workstation #'.$workstation->id.'.'));

					Response::redirect('admin/workstations');
				}

				else
				{
					Session::set_flash('error', e('Could not save workstation.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Workstations";
		$this->template->content = View::forge('admin/workstations/create');

	}

	public function action_edit($id = null)
	{
		$workstation = Model_Workstation::find($id);
		$val = Model_Workstation::validate('edit');

		if ($val->run())
		{
			$workstation->name = Input::post('name');
			$workstation->pc_name = Input::post('pc_name');
			$workstation->processor_key = Input::post('processor_key');
			$workstation->image_layout = Input::post('image_layout');
			$workstation->location_id = Input::post('location_id');

			if ($workstation->save())
			{
				Session::set_flash('success', e('Updated workstation #' . $id));

				Response::redirect('admin/workstations');
			}

			else
			{
				Session::set_flash('error', e('Could not update workstation #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$workstation->name = $val->validated('name');
				$workstation->pc_name = $val->validated('pc_name');
				$workstation->processor_key = $val->validated('processor_key');
				$workstation->image_layout = $val->validated('image_layout');
				$workstation->location_id = $val->validated('location_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('workstation', $workstation, false);
		}

		$this->template->title = "Workstations";
		$this->template->content = View::forge('admin/workstations/edit');

	}

	public function action_delete($id = null)
	{
		if ($workstation = Model_Workstation::find($id))
		{
			$workstation->delete();

			Session::set_flash('success', e('Deleted workstation #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete workstation #'.$id));
		}

		Response::redirect('admin/workstations');

	}

}
