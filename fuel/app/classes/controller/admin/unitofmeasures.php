<?php
class Controller_Admin_Unitofmeasures extends Controller_Admin
{

	public function action_index()
	{
		$data['unitofmeasures'] = Model_Unitofmeasure::find('all');
		$this->template->title = "Unitofmeasures";
		$this->template->content = View::forge('admin/unitofmeasures/index', $data);

	}

	public function action_view($id = null)
	{
		$data['unitofmeasure'] = Model_Unitofmeasure::find($id);

		$this->template->title = "Unitofmeasure";
		$this->template->content = View::forge('admin/unitofmeasures/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Unitofmeasure::validate('create');

			if ($val->run())
			{
				$unitofmeasure = Model_Unitofmeasure::forge(array(
					'unit_of_measures_name' => Input::post('unit_of_measures_name'),
				));

				if ($unitofmeasure and $unitofmeasure->save())
				{
					Session::set_flash('success', e('Added unitofmeasure #'.$unitofmeasure->id.'.'));

					Response::redirect('admin/unitofmeasures');
				}

				else
				{
					Session::set_flash('error', e('Could not save unitofmeasure.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Unitofmeasures";
		$this->template->content = View::forge('admin/unitofmeasures/create');

	}

	public function action_edit($id = null)
	{
		$unitofmeasure = Model_Unitofmeasure::find($id);
		$val = Model_Unitofmeasure::validate('edit');

		if ($val->run())
		{
			$unitofmeasure->unit_of_measures_name = Input::post('unit_of_measures_name');

			if ($unitofmeasure->save())
			{
				Session::set_flash('success', e('Updated unitofmeasure #' . $id));

				Response::redirect('admin/unitofmeasures');
			}

			else
			{
				Session::set_flash('error', e('Could not update unitofmeasure #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$unitofmeasure->unit_of_measures_name = $val->validated('unit_of_measures_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('unitofmeasure', $unitofmeasure, false);
		}

		$this->template->title = "Unitofmeasures";
		$this->template->content = View::forge('admin/unitofmeasures/edit');

	}

	public function action_delete($id = null)
	{
		if ($unitofmeasure = Model_Unitofmeasure::find($id))
		{
			$unitofmeasure->delete();

			Session::set_flash('success', e('Deleted unitofmeasure #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete unitofmeasure #'.$id));
		}

		Response::redirect('admin/unitofmeasures');

	}

}
