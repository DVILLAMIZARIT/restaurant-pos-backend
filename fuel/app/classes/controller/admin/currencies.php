<?php
class Controller_Admin_Currencies extends Controller_Admin
{

	public function action_index()
	{
                $config = Fuel\Core\Config::get('pagination');
                $pagination = Fuel\Core\Pagination::forge('admin.currencies', $config);
                $pagination->total_items = Model_Customer::count();
                
                $data['pagination'] = $pagination;                
		$data['currencies'] = Model_Currency::find('all', array(
                    'order_by' => array(
                        array('country', 'asc')
                    ),
                    'limit' => $pagination->per_page,
                    'offset' => $pagination->offset,
                ));
                
		$this->template->title = "Currencies";
		$this->template->content = View::forge('admin/currencies/index', $data);

	}

	public function action_view($id = null)
	{
		$data['currency'] = Model_Currency::find($id);

		$this->template->title = "Currency";
		$this->template->content = View::forge('admin/currencies/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Currency::validate('create');

			if ($val->run())
			{
				$currency = Model_Currency::forge(array(
					'name' => Input::post('name'),
					'symbol' => Input::post('symbol'),
					'country' => Input::post('country'),
					'is_default' => Input::post('is_default'),
					'exchange_rate' => Input::post('exchange_rate'),
				));

				if ($currency and $currency->save())
				{
					Session::set_flash('success', e('Added currency #'.$currency->id.'.'));

					Response::redirect('admin/currencies');
				}

				else
				{
					Session::set_flash('error', e('Could not save currency.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

                $countries = Model_Country::find('all', array('order_by' => array(array('name', 'asc'))));
                $this->template->set_global('countries', $countries);
                $this->template->set_global('yes_no', array('0' => 'No', '1' => 'Yes'));
                
		$this->template->title = "Currencies";
		$this->template->content = View::forge('admin/currencies/create');

	}

	public function action_edit($id = null)
	{
		$currency = Model_Currency::find($id);
		$val = Model_Currency::validate('edit');

		if ($val->run())
		{
			$currency->name = Input::post('name');
			$currency->symbol = Input::post('symbol');
			$currency->country = Input::post('country');
			$currency->is_default = Input::post('is_default');
			$currency->exchange_rate = Input::post('exchange_rate');

			if ($currency->save())
			{
				Session::set_flash('success', e('Updated currency #' . $id));

				Response::redirect('admin/currencies');
			}

			else
			{
				Session::set_flash('error', e('Could not update currency #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$currency->name = $val->validated('name');
				$currency->symbol = $val->validated('symbol');
				$currency->country = $val->validated('country');
				$currency->is_default = $val->validated('is_default');
				$currency->exchange_rate = $val->validated('exchange_rate');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('currency', $currency, false);
		}
                
                $countries = Model_Country::find('all', array('order_by' => array(array('name', 'asc'))));
                $this->template->set_global('countries', $countries);
                $this->template->set_global('yes_no', array('0' => 'No', '1' => 'Yes'));

		$this->template->title = "Currencies";
		$this->template->content = View::forge('admin/currencies/edit');

	}

	public function action_delete($id = null)
	{
		if ($currency = Model_Currency::find($id))
		{
			$currency->delete();

			Session::set_flash('success', e('Deleted currency #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete currency #'.$id));
		}

		Response::redirect('admin/currencies');

	}

}
