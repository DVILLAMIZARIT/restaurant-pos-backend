<?php
class Controller_Admin_Product_Subcategories extends Controller_Admin
{

	public function action_index()
	{
		$data['product_subcategories'] = Model_Product_Subcategory::find('all');
		$this->template->title = "Product_subcategories";
		$this->template->content = View::forge('admin/product/subcategories/index', $data);

	}

	public function action_view($id = null)
	{
		$data['product_subcategory'] = Model_Product_Subcategory::find($id);

		$this->template->title = "Product_subcategory";
		$this->template->content = View::forge('admin/product/subcategories/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Product_Subcategory::validate('create');

			if ($val->run())
			{
				$product_subcategory = Model_Product_Subcategory::forge(array(
					'name' => Input::post('name'),
					'product_id' => Input::post('product_id'),
					'orientation' => Input::post('orientation'),
					'picture' => Input::post('picture'),
				));

				if ($product_subcategory and $product_subcategory->save())
				{
					Session::set_flash('success', e('Added product_subcategory #'.$product_subcategory->id.'.'));

					Response::redirect('admin/product/subcategories');
				}

				else
				{
					Session::set_flash('error', e('Could not save product_subcategory.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Product_Subcategories";
		$this->template->content = View::forge('admin/product/subcategories/create');

	}

	public function action_edit($id = null)
	{
		$product_subcategory = Model_Product_Subcategory::find($id);
		$val = Model_Product_Subcategory::validate('edit');

		if ($val->run())
		{
			$product_subcategory->name = Input::post('name');
			$product_subcategory->product_id = Input::post('product_id');
			$product_subcategory->orientation = Input::post('orientation');
			$product_subcategory->picture = Input::post('picture');

			if ($product_subcategory->save())
			{
				Session::set_flash('success', e('Updated product_subcategory #' . $id));

				Response::redirect('admin/product/subcategories');
			}

			else
			{
				Session::set_flash('error', e('Could not update product_subcategory #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$product_subcategory->name = $val->validated('name');
				$product_subcategory->product_id = $val->validated('product_id');
				$product_subcategory->orientation = $val->validated('orientation');
				$product_subcategory->picture = $val->validated('picture');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('product_subcategory', $product_subcategory, false);
		}

		$this->template->title = "Product_subcategories";
		$this->template->content = View::forge('admin/product/subcategories/edit');

	}

	public function action_delete($id = null)
	{
		if ($product_subcategory = Model_Product_Subcategory::find($id))
		{
			$product_subcategory->delete();

			Session::set_flash('success', e('Deleted product_subcategory #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete product_subcategory #'.$id));
		}

		Response::redirect('admin/product/subcategories');

	}

}
