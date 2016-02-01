<?php
class Controller_Admin_Locations extends Controller_Admin
{

	public function action_index()
	{
		$data['locations'] = Model_Location::find('all');
		$this->template->title = "Locations";
		$this->template->content = View::forge('admin/locations/index', $data);

	}

	public function action_view($id = null)
	{
		$data['location'] = Model_Location::find($id);

		$this->template->title = "Location";
		$this->template->content = View::forge('admin/locations/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Location::validate('create');

			if ($val->run())
			{
				$location = Model_Location::forge(array(
					'name' => Input::post('name'),
					'can_sell' => Input::post('can_sell'),
				));

				if ($location and $location->save())
				{
					Session::set_flash('success', e('Added location #'.$location->id.'.'));

					Response::redirect('admin/locations');
				}

				else
				{
					Session::set_flash('error', e('Could not save location.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Locations";
		$this->template->content = View::forge('admin/locations/create');

	}

	public function action_edit($id = null)
	{
		$location = Model_Location::find($id);
		$val = Model_Location::validate('edit');

		if ($val->run())
		{
			$location->name = Input::post('name');
			$location->can_sell = Input::post('can_sell');

			if ($location->save())
			{
				Session::set_flash('success', e('Updated location #' . $id));

				Response::redirect('admin/locations');
			}

			else
			{
				Session::set_flash('error', e('Could not update location #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$location->name = $val->validated('name');
				$location->can_sell = $val->validated('can_sell');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('location', $location, false);
		}

		$this->template->title = "Locations";
		$this->template->content = View::forge('admin/locations/edit');

	}

	public function action_delete($id = null)
	{
		if ($location = Model_Location::find($id))
		{
			$location->delete();

			Session::set_flash('success', e('Deleted location #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete location #'.$id));
		}

		Response::redirect('admin/locations');

	}

}
