<?php
class Controller_Admin_Inventory_Units extends Controller_Admin
{

	public function action_index()
	{
                $config = \Fuel\Core\Config::get('pagination');
                $pagination = \Fuel\Core\Pagination::forge('inventory.units', $config);
                $pagination->total_items = Model_Inventory_Unit::count();
                
                $data['pagination'] = $pagination;                
		$data['inventory_units'] = Model_Inventory_Unit::find('all', array(
                    'order_by' => array(
                        array('name', 'asc')
                    ),
                    'limit' => $pagination->per_page,
                    'offset' => $pagination->offset,
                ));
                
		$this->template->title = "Inventory Units &raquo; Listing";
		$this->template->content = View::forge('admin/inventory/units/index', $data);

	}

	public function action_view($id = null)
	{
		if ($inventory_unit = Model_Inventory_Unit::find($id))
                {
                    $this->template->title = "Inventory Unit &raquo; ".$inventory_unit->name." &raquo; View";
                    $this->template->content = View::forge('admin/inventory/units/view', array(
                        'inventory_unit' => $inventory_unit,
                    ));
                }
                else
                {
                    Fuel\Core\Session::set_flash('error', 'The selected item could not be found');
                    Fuel\Core\Response::redirect_back('admin/inventory/units');
                }

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

					Response::redirect('admin/inventory/units/view/'.$inventory_unit->id);
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

		$this->template->title = "Inventory Units &raquo; Create";
		$this->template->content = View::forge('admin/inventory/units/create');

	}

	public function action_edit($id = null)
	{
		if ($inventory_unit = Model_Inventory_Unit::find($id))
                {
                    $val = Model_Inventory_Unit::validate('edit');

                    if ($val->run())
                    {
                            $inventory_unit->name = Input::post('name');

                            if ($inventory_unit->save())
                            {
                                    Session::set_flash('success', e('Updated inventory_unit #' . $id));

                                    Response::redirect('admin/inventory/units/view/'.$inventory_unit->id);
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

                    $this->template->title = "Inventory Units &raquo; ".$inventory_unit->name." &raquo; Edit";
                    $this->template->content = View::forge('admin/inventory/units/edit');
                }
                else
                {
                    Fuel\Core\Session::set_flash('error', 'The selected item could not be found');
                    Fuel\Core\Response::redirect_back('admin/inventory/units');
                }

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
