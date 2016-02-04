<?php
class Controller_Admin_Inventory extends Controller_Admin
{

	public function action_index()
	{
                $config = Fuel\Core\Config::get('pagination');
                $pagination = Fuel\Core\Pagination::forge('admin.inventory', $config);
                $pagination->total_items = Model_Inventory::count();
                
                $data['pagination'] = $pagination;
		$data['inventories'] = Model_Inventory::find('all', array(
                    'order_by' => array(
                        array('description', 'asc')
                    ),
                    'limit' => $pagination->per_page,
                    'offset' => $pagination->offset,
                ));
                
		$this->template->title = "Inventory &raquo; Listing";
		$this->template->content = View::forge('admin/inventory/index', $data);

	}

	public function action_view($id = null)
	{
		if ($inventory = Model_Inventory::find($id))
                {
                    $this->template->title = "Inventory &raquo; ".$inventory->description." &raquo; View ";
                    $this->template->content = View::forge('admin/inventory/view', array(
                        'inventory' => $inventory
                    ));
                }
                else
                {
                    Fuel\Core\Session::set_flash('error', 'Cannot find the selected item');
                    \Fuel\Core\Response::redirect_back('admin/inventory');
                }

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

					Response::redirect('admin/inventory/view/'.$inventory->id);
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
                
                $this->template->set_global('inventory_units', Model_Inventory_Unit::find('all', array(
                    'order_by' => array(
                        array('name', 'asc')
                    )
                )));

		$this->template->title = "Inventory &raquo; Create";
		$this->template->content = View::forge('admin/inventory/create');

	}

	public function action_edit($id = null)
	{
		if ($inventory = Model_Inventory::find($id))
                {
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

                                    Response::redirect('admin/inventory/view/'.$inventory->id);
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
                
                    $this->template->set_global('inventory_units', Model_Inventory_Unit::find('all', array(
                        'order_by' => array(
                            array('name', 'asc')
                        )
                    )));

                    $this->template->title = "Inventory &raquo; ".$inventory->description." &raquo; Edit";
                    $this->template->content = View::forge('admin/inventory/edit');
                }
                else
                {
                    Fuel\Core\Session::set_flash('error', 'Cannot find the selected item');
                    \Fuel\Core\Response::redirect_back('admin/inventory');
                }

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
