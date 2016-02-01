<?php
class Controller_Admin_Inventory_Units extends Controller_Admin
{

	public function action_index()
	{
		$data['inventory_units'] = Model_Inventory_Unit::find('all');
		$this->template->title = "Inventory_units";
		$this->template->content = View::forge('admin/inventory/units/index', $data);

	}

	public function action_view($id = null)
	{
		$data['inventory_unit'] = Model_Inventory_Unit::find($id);

		$this->template->title = "Inventory_unit";
		$this->template->content = View::forge('admin/inventory/units/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Inventory_Unit::validate('create');

			if ($val->run())
			{
				$inventory_unit = Model_Inventory_Unit::forge(array(
					'name' => Input::post('name'),
				));

				if ($inventory_unit and $inventory_unit->save())
				{
					Session::set_flash('success', e('Added inventory_unit #'.$inventory_unit->id.'.'));

					Response::redirect('admin/inventory/units');
				}

				else
				{
					Session::set_flash('error', e('Could not save inventory_unit.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Inventory_Units";
		$this->template->content = View::forge('admin/inventory/units/create');

	}

	public function action_edit($id = null)
	{
		$inventory_unit = Model_Inventory_Unit::find($id);
		$val = Model_Inventory_Unit::validate('edit');

		if ($val->run())
		{
			$inventory_unit->name = Input::post('name');

			if ($inventory_unit->save())
			{
				Session::set_flash('success', e('Updated inventory_unit #' . $id));

				Response::redirect('admin/inventory/units');
			}

			else
			{
				Session::set_flash('error', e('Could not update inventory_unit #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$inventory_unit->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('inventory_unit', $inventory_unit, false);
		}

		$this->template->title = "Inventory_units";
		$this->template->content = View::forge('admin/inventory/units/edit');

	}

	public function action_delete($id = null)
	{
		if ($inventory_unit = Model_Inventory_Unit::find($id))
		{
			$inventory_unit->delete();

			Session::set_flash('success', e('Deleted inventory_unit #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete inventory_unit #'.$id));
		}

		Response::redirect('admin/inventory/units');

	}

}
