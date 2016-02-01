<?php
class Controller_Admin_Customers extends Controller_Admin
{

	public function action_index()
	{
		$data['customers'] = Model_Customer::find('all');
		$this->template->title = "Customers";
		$this->template->content = View::forge('admin/customers/index', $data);

	}

	public function action_view($id = null)
	{
		$data['customer'] = Model_Customer::find($id);

		$this->template->title = "Customer";
		$this->template->content = View::forge('admin/customers/view', $data);

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

					Response::redirect('admin/customers');
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

		$this->template->title = "Customers";
		$this->template->content = View::forge('admin/customers/create');

	}

	public function action_edit($id = null)
	{
		$customer = Model_Customer::find($id);
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

				Response::redirect('admin/customers');
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

		$this->template->title = "Customers";
		$this->template->content = View::forge('admin/customers/edit');

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
