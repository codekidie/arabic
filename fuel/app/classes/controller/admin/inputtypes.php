<?php
class Controller_Admin_Inputtypes extends Controller_Admin
{

	public function action_index()
	{
		$data['inputtypes'] = Model_Inputtype::find('all');
		$this->template->title = "Inputtypes";
		$this->template->content = View::forge('admin/inputtypes/index', $data);

	}

	public function action_view($id = null)
	{
		$data['inputtype'] = Model_Inputtype::find($id);

		$this->template->title = "Inputtype";
		$this->template->content = View::forge('admin/inputtypes/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Inputtype::validate('create');

			if ($val->run())
			{
				$inputtype = Model_Inputtype::forge(array(
					'input_type_name' => Input::post('input_type_name'),
				));

				if ($inputtype and $inputtype->save())
				{
					Session::set_flash('success', e('Added inputtype #'.$inputtype->id.'.'));

					Response::redirect('admin/inputtypes');
				}

				else
				{
					Session::set_flash('error', e('Could not save inputtype.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Inputtypes";
		$this->template->content = View::forge('admin/inputtypes/create');

	}

	public function action_edit($id = null)
	{
		$inputtype = Model_Inputtype::find($id);
		$val = Model_Inputtype::validate('edit');

		if ($val->run())
		{
			$inputtype->input_type_name = Input::post('input_type_name');

			if ($inputtype->save())
			{
				Session::set_flash('success', e('Updated inputtype #' . $id));

				Response::redirect('admin/inputtypes');
			}

			else
			{
				Session::set_flash('error', e('Could not update inputtype #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$inputtype->input_type_name = $val->validated('input_type_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('inputtype', $inputtype, false);
		}

		$this->template->title = "Inputtypes";
		$this->template->content = View::forge('admin/inputtypes/edit');

	}

	public function action_delete($id = null)
	{
		if ($inputtype = Model_Inputtype::find($id))
		{
			$inputtype->delete();

			Session::set_flash('success', e('Deleted inputtype #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete inputtype #'.$id));
		}

		Response::redirect('admin/inputtypes');

	}

}
