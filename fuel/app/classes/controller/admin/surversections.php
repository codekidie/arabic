<?php
class Controller_Admin_Surversections extends Controller_Admin
{

	public function action_index()
	{
		$data['surversections'] = Model_Surversection::find('all');
		$this->template->title = "Surversections";
		$this->template->content = View::forge('admin/surversections/index', $data);

	}

	public function action_view($id = null)
	{
		$data['surversection'] = Model_Surversection::find($id);

		$this->template->title = "Surversection";
		$this->template->content = View::forge('admin/surversections/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Surversection::validate('create');

			if ($val->run())
			{
				$surversection = Model_Surversection::forge(array(
					'survey_header_id' => Input::post('survey_header_id'),
					'section_name' => Input::post('section_name'),
					'section_title' => Input::post('section_title'),
					'section_subheading' => Input::post('section_subheading'),
					'section_required_yn' => Input::post('section_required_yn'),
				));

				if ($surversection and $surversection->save())
				{
					Session::set_flash('success', e('Added surversection #'.$surversection->id.'.'));

					Response::redirect('admin/surversections');
				}

				else
				{
					Session::set_flash('error', e('Could not save surversection.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Surversections";
		$this->template->content = View::forge('admin/surversections/create');

	}

	public function action_edit($id = null)
	{
		$surversection = Model_Surversection::find($id);
		$val = Model_Surversection::validate('edit');

		if ($val->run())
		{
			$surversection->survey_header_id = Input::post('survey_header_id');
			$surversection->section_name = Input::post('section_name');
			$surversection->section_title = Input::post('section_title');
			$surversection->section_subheading = Input::post('section_subheading');
			$surversection->section_required_yn = Input::post('section_required_yn');

			if ($surversection->save())
			{
				Session::set_flash('success', e('Updated surversection #' . $id));

				Response::redirect('admin/surversections');
			}

			else
			{
				Session::set_flash('error', e('Could not update surversection #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$surversection->survey_header_id = $val->validated('survey_header_id');
				$surversection->section_name = $val->validated('section_name');
				$surversection->section_title = $val->validated('section_title');
				$surversection->section_subheading = $val->validated('section_subheading');
				$surversection->section_required_yn = $val->validated('section_required_yn');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('surversection', $surversection, false);
		}

		$this->template->title = "Surversections";
		$this->template->content = View::forge('admin/surversections/edit');

	}

	public function action_delete($id = null)
	{
		if ($surversection = Model_Surversection::find($id))
		{
			$surversection->delete();

			Session::set_flash('success', e('Deleted surversection #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete surversection #'.$id));
		}

		Response::redirect('admin/surversections');

	}

}
