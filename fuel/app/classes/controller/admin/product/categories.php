<?php
class Controller_Admin_Product_Categories extends Controller_Admin
{

	public function action_index()
	{
		$data['product_categories'] = Model_Product_Category::find('all');
		$this->template->title = "Product_categories";
		$this->template->content = View::forge('admin/product/categories/index', $data);

	}

	public function action_view($id = null)
	{
		$data['product_category'] = Model_Product_Category::find($id);

		$this->template->title = "Product_category";
		$this->template->content = View::forge('admin/product/categories/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Product_Category::validate('create');

			if ($val->run())
			{
				$product_category = Model_Product_Category::forge(array(
					'name' => Input::post('name'),
					'picture' => Input::post('picture'),
					'orientation' => Input::post('orientation'),
				));

				if ($product_category and $product_category->save())
				{
					Session::set_flash('success', e('Added product_category #'.$product_category->id.'.'));

					Response::redirect('admin/product/categories');
				}

				else
				{
					Session::set_flash('error', e('Could not save product_category.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Product_Categories";
		$this->template->content = View::forge('admin/product/categories/create');

	}

	public function action_edit($id = null)
	{
		$product_category = Model_Product_Category::find($id);
		$val = Model_Product_Category::validate('edit');

		if ($val->run())
		{
			$product_category->name = Input::post('name');
			$product_category->picture = Input::post('picture');
			$product_category->orientation = Input::post('orientation');

			if ($product_category->save())
			{
				Session::set_flash('success', e('Updated product_category #' . $id));

				Response::redirect('admin/product/categories');
			}

			else
			{
				Session::set_flash('error', e('Could not update product_category #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$product_category->name = $val->validated('name');
				$product_category->picture = $val->validated('picture');
				$product_category->orientation = $val->validated('orientation');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('product_category', $product_category, false);
		}

		$this->template->title = "Product_categories";
		$this->template->content = View::forge('admin/product/categories/edit');

	}

	public function action_delete($id = null)
	{
		if ($product_category = Model_Product_Category::find($id))
		{
			$product_category->delete();

			Session::set_flash('success', e('Deleted product_category #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete product_category #'.$id));
		}

		Response::redirect('admin/product/categories');

	}

}
