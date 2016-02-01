<?php
class Controller_Admin_Inventory extends Controller_Admin
{

	public function action_index()
	{
		$data['inventories'] = Model_Inventory::find('all');
		$this->template->title = "Inventories";
		$this->template->content = View::forge('admin/inventory/index', $data);

	}

	public function action_view($id = null)
	{
		$data['inventory'] = Model_Inventory::find($id);

		$this->template->title = "Inventory";
		$this->template->content = View::forge('admin/inventory/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Inventory::validate('create');

			if ($val->run())
			{
				$inventory = Model_Inventory::forge(array(
					'description' => Input::post('description'),
					'barcode' => Input::post('barcode'),
					'short_code' => Input::post('short_code'),
					'inventory_units_id' => Input::post('inventory_units_id'),
					'warning_level' => Input::post('warning_level'),
				));

				if ($inventory and $inventory->save())
				{
					Session::set_flash('success', e('Added inventory #'.$inventory->id.'.'));

					Response::redirect('admin/inventory');
				}

				else
				{
					Session::set_flash('error', e('Could not save inventory.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Inventories";
		$this->template->content = View::forge('admin/inventory/create');

	}

	public function action_edit($id = null)
	{
		$inventory = Model_Inventory::find($id);
		$val = Model_Inventory::validate('edit');

		if ($val->run())
		{
			$inventory->description = Input::post('description');
			$inventory->barcode = Input::post('barcode');
			$inventory->short_code = Input::post('short_code');
			$inventory->inventory_units_id = Input::post('inventory_units_id');
			$inventory->warning_level = Input::post('warning_level');

			if ($inventory->save())
			{
				Session::set_flash('success', e('Updated inventory #' . $id));

				Response::redirect('admin/inventory');
			}

			else
			{
				Session::set_flash('error', e('Could not update inventory #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$inventory->description = $val->validated('description');
				$inventory->barcode = $val->validated('barcode');
				$inventory->short_code = $val->validated('short_code');
				$inventory->inventory_units_id = $val->validated('inventory_units_id');
				$inventory->warning_level = $val->validated('warning_level');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('inventory', $inventory, false);
		}

		$this->template->title = "Inventories";
		$this->template->content = View::forge('admin/inventory/edit');

	}

	public function action_delete($id = null)
	{
		if ($inventory = Model_Inventory::find($id))
		{
			$inventory->delete();

			Session::set_flash('success', e('Deleted inventory #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete inventory #'.$id));
		}

		Response::redirect('admin/inventory');

	}

}
