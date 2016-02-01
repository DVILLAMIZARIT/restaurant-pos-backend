<?php
class Controller_Admin_Products extends Controller_Admin
{

	public function action_index()
	{
		$data['products'] = Model_Product::find('all');
		$this->template->title = "Products";
		$this->template->content = View::forge('admin/products/index', $data);

	}

	public function action_view($id = null)
	{
		$data['product'] = Model_Product::find($id);

		$this->template->title = "Product";
		$this->template->content = View::forge('admin/products/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Product::validate('create');

			if ($val->run())
			{
				$product = Model_Product::forge(array(
					'description' => Input::post('description'),
					'barcode' => Input::post('barcode'),
					'short_code' => Input::post('short_code'),
					'cost_price' => Input::post('cost_price'),
					'retail_price' => Input::post('retail_price'),
					'is_taxable' => Input::post('is_taxable'),
					'discontinued' => Input::post('discontinued'),
					'picture' => Input::post('picture'),
					'product_details' => Input::post('product_details'),
				));

				if ($product and $product->save())
				{
					Session::set_flash('success', e('Added product #'.$product->id.'.'));

					Response::redirect('admin/products');
				}

				else
				{
					Session::set_flash('error', e('Could not save product.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Products";
		$this->template->content = View::forge('admin/products/create');

	}

	public function action_edit($id = null)
	{
		$product = Model_Product::find($id);
		$val = Model_Product::validate('edit');

		if ($val->run())
		{
			$product->description = Input::post('description');
			$product->barcode = Input::post('barcode');
			$product->short_code = Input::post('short_code');
			$product->cost_price = Input::post('cost_price');
			$product->retail_price = Input::post('retail_price');
			$product->is_taxable = Input::post('is_taxable');
			$product->discontinued = Input::post('discontinued');
			$product->picture = Input::post('picture');
			$product->product_details = Input::post('product_details');

			if ($product->save())
			{
				Session::set_flash('success', e('Updated product #' . $id));

				Response::redirect('admin/products');
			}

			else
			{
				Session::set_flash('error', e('Could not update product #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$product->description = $val->validated('description');
				$product->barcode = $val->validated('barcode');
				$product->short_code = $val->validated('short_code');
				$product->cost_price = $val->validated('cost_price');
				$product->retail_price = $val->validated('retail_price');
				$product->is_taxable = $val->validated('is_taxable');
				$product->discontinued = $val->validated('discontinued');
				$product->picture = $val->validated('picture');
				$product->product_details = $val->validated('product_details');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('product', $product, false);
		}

		$this->template->title = "Products";
		$this->template->content = View::forge('admin/products/edit');

	}

	public function action_delete($id = null)
	{
		if ($product = Model_Product::find($id))
		{
			$product->delete();

			Session::set_flash('success', e('Deleted product #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete product #'.$id));
		}

		Response::redirect('admin/products');

	}

}
