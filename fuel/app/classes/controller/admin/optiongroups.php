<?php
class Controller_Admin_Optiongroups extends Controller_Admin
{

	public function action_index()
	{
		$data['optiongroups'] = Model_Optiongroup::find('all');
		$this->template->title = "Optiongroups";
		$this->template->content = View::forge('admin/optiongroups/index', $data);

	}

	public function action_view($id = null)
	{
		$data['optiongroup'] = Model_Optiongroup::find($id);

		$this->template->title = "Optiongroup";
		$this->template->content = View::forge('admin/optiongroups/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Optiongroup::validate('create');

			if ($val->run())
			{
				$optiongroup = Model_Optiongroup::forge(array(
					'option_group_name' => Input::post('option_group_name'),
				));

				if ($optiongroup and $optiongroup->save())
				{
					Session::set_flash('success', e('Added optiongroup #'.$optiongroup->id.'.'));

					Response::redirect('admin/optiongroups');
				}

				else
				{
					Session::set_flash('error', e('Could not save optiongroup.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Optiongroups";
		$this->template->content = View::forge('admin/optiongroups/create');

	}

	public function action_edit($id = null)
	{
		$optiongroup = Model_Optiongroup::find($id);
		$val = Model_Optiongroup::validate('edit');

		if ($val->run())
		{
			$optiongroup->option_group_name = Input::post('option_group_name');

			if ($optiongroup->save())
			{
				Session::set_flash('success', e('Updated optiongroup #' . $id));

				Response::redirect('admin/optiongroups');
			}

			else
			{
				Session::set_flash('error', e('Could not update optiongroup #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$optiongroup->option_group_name = $val->validated('option_group_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('optiongroup', $optiongroup, false);
		}

		$this->template->title = "Optiongroups";
		$this->template->content = View::forge('admin/optiongroups/edit');

	}

	public function action_delete($id = null)
	{
		if ($optiongroup = Model_Optiongroup::find($id))
		{
			$optiongroup->delete();

			Session::set_flash('success', e('Deleted optiongroup #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete optiongroup #'.$id));
		}

		Response::redirect('admin/optiongroups');

	}

}
