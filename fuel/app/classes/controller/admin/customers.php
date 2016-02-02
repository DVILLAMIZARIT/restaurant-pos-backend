<?php
class Controller_Admin_Customers extends Controller_Admin
{

	public function action_index()
	{                
                $config = \Fuel\Core\Config::get('pagination');                
                $pagination = \Fuel\Core\Pagination::forge('customers', $config);
                $pagination->total_items = Model_Customer::count();
                
		$data['customers'] = Model_Customer::find('all', array(
                    'limit' => $pagination->per_page,
                    'offset' => $pagination->offset,
                ));
                
                $data['pagination'] = $pagination;
                
		$this->template->title = "Customers &raquo; Listing";
		$this->template->content = View::forge('admin/customers/index', $data);

	}

	public function action_view($id = null)
	{
		if ($customer = Model_Customer::find($id))
		{
			$this->template->title = "Customer &raquo; ".$customer->description." &raquo; View";
			$this->template->content = View::forge('admin/customers/view', array('customer' => $customer));
		}
		else
		{
			Session::set_flash('error', 'Cannot find the selected customer.');
			Response::redirect_back('admin/customers');
		}

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Customer::validate('create');

			if ($val->run())
			{
				$customer = Model_Customer::forge(array(
					'description' => Input::post('description'),
					'contact_person' => Input::post('contact_person'),
					'phone' => Input::post('phone'),
					'email' => Input::post('email'),
				));

				if ($customer and $customer->save())
				{
					Session::set_flash('success', e('Added customer #'.$customer->id.'.'));

					Response::redirect('admin/customers/view/'.$customer->id);
				}

				else
				{
					Session::set_flash('error', e('Could not save customer.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Customers &raquo; Create";
		$this->template->content = View::forge('admin/customers/create');

	}

	public function action_edit($id = null)
	{
		if ($customer = Model_Customer::find($id))
		{
			$val = Model_Customer::validate('edit');

			if ($val->run())
			{
				$customer->description = Input::post('description');
				$customer->contact_person = Input::post('contact_person');
				$customer->phone = Input::post('phone');
				$customer->email = Input::post('email');

				if ($customer->save())
				{
					Session::set_flash('success', e('Updated customer #' . $id));

					Response::redirect('admin/customers/view/'.$customer->id);
				}

				else
				{
					Session::set_flash('error', e('Could not update customer #' . $id));
				}
			}

			else
			{
				if (Input::method() == 'POST')
				{
					$customer->description = $val->validated('description');
					$customer->contact_person = $val->validated('contact_person');
					$customer->phone = $val->validated('phone');
					$customer->email = $val->validated('email');

					Session::set_flash('error', $val->error());
				}

				$this->template->set_global('customer', $customer, false);
			}

			$this->template->title = "Customers &raquo; ".$customer->description." &raquo; Edit";
			$this->template->content = View::forge('admin/customers/edit');
		}
		else
		{
			Session::set_flash('error', 'Cannot find the selected customer.');
			Response::redirect_back('admin/customers');
		}

	}

	public function action_delete($id = null)
	{
		if ($customer = Model_Customer::find($id))
		{
			$customer->delete();

			Session::set_flash('success', e('Deleted customer #'.$id));
		}
		else
		{
			Session::set_flash('error', e('Could not delete customer #'.$id));
		}

		Response::redirect('admin/customers');

	}

}
