<?php
class Controller_Admin_Suppliers extends Controller_Admin
{

	public function action_index()
	{
		$data['suppliers'] = Model_Supplier::find('all');
		$this->template->title = "Suppliers";
		$this->template->content = View::forge('admin/suppliers/index', $data);

	}

	public function action_view($id = null)
	{
		$data['supplier'] = Model_Supplier::find($id);

		$this->template->title = "Supplier";
		$this->template->content = View::forge('admin/suppliers/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Supplier::validate('create');

			if ($val->run())
			{
				$supplier = Model_Supplier::forge(array(
					'description' => Input::post('description'),
					'contact_person' => Input::post('contact_person'),
					'phone' => Input::post('phone'),
					'email' => Input::post('email'),
				));

				if ($supplier and $supplier->save())
				{
					Session::set_flash('success', e('Added supplier #'.$supplier->id.'.'));

					Response::redirect('admin/suppliers');
				}

				else
				{
					Session::set_flash('error', e('Could not save supplier.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Suppliers";
		$this->template->content = View::forge('admin/suppliers/create');

	}

	public function action_edit($id = null)
	{
		$supplier = Model_Supplier::find($id);
		$val = Model_Supplier::validate('edit');

		if ($val->run())
		{
			$supplier->description = Input::post('description');
			$supplier->contact_person = Input::post('contact_person');
			$supplier->phone = Input::post('phone');
			$supplier->email = Input::post('email');

			if ($supplier->save())
			{
				Session::set_flash('success', e('Updated supplier #' . $id));

				Response::redirect('admin/suppliers');
			}

			else
			{
				Session::set_flash('error', e('Could not update supplier #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$supplier->description = $val->validated('description');
				$supplier->contact_person = $val->validated('contact_person');
				$supplier->phone = $val->validated('phone');
				$supplier->email = $val->validated('email');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('supplier', $supplier, false);
		}

		$this->template->title = "Suppliers";
		$this->template->content = View::forge('admin/suppliers/edit');

	}

	public function action_delete($id = null)
	{
		if ($supplier = Model_Supplier::find($id))
		{
			$supplier->delete();

			Session::set_flash('success', e('Deleted supplier #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete supplier #'.$id));
		}

		Response::redirect('admin/suppliers');

	}

}
