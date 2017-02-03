<?php
class Controller_Admin_Surveyheaders extends Controller_Admin
{

	public function action_index()
	{
		$data['surveyheaders'] = Model_Surveyheader::find('all');
		$this->template->title = "Surveyheaders";
		$this->template->content = View::forge('admin/surveyheaders/index', $data);

	}

	public function action_view($id = null)
	{
		$data['surveyheader'] = Model_Surveyheader::find($id);

		$this->template->title = "Surveyheader";
		$this->template->content = View::forge('admin/surveyheaders/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Surveyheader::validate('create');

			if ($val->run())
			{
				$surveyheader = Model_Surveyheader::forge(array(
					'organization_id' => Input::post('organization_id'),
					'survey_name' => Input::post('survey_name'),
					'instructions' => Input::post('instructions'),
					'other_header_info' => Input::post('other_header_info'),
				));

				if ($surveyheader and $surveyheader->save())
				{
					Session::set_flash('success', e('Added surveyheader #'.$surveyheader->id.'.'));

					Response::redirect('admin/surveyheaders');
				}

				else
				{
					Session::set_flash('error', e('Could not save surveyheader.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Surveyheaders";
		$this->template->content = View::forge('admin/surveyheaders/create');

	}

	public function action_edit($id = null)
	{
		$surveyheader = Model_Surveyheader::find($id);
		$val = Model_Surveyheader::validate('edit');

		if ($val->run())
		{
			$surveyheader->organization_id = Input::post('organization_id');
			$surveyheader->survey_name = Input::post('survey_name');
			$surveyheader->instructions = Input::post('instructions');
			$surveyheader->other_header_info = Input::post('other_header_info');

			if ($surveyheader->save())
			{
				Session::set_flash('success', e('Updated surveyheader #' . $id));

				Response::redirect('admin/surveyheaders');
			}

			else
			{
				Session::set_flash('error', e('Could not update surveyheader #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$surveyheader->organization_id = $val->validated('organization_id');
				$surveyheader->survey_name = $val->validated('survey_name');
				$surveyheader->instructions = $val->validated('instructions');
				$surveyheader->other_header_info = $val->validated('other_header_info');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('surveyheader', $surveyheader, false);
		}

		$this->template->title = "Surveyheaders";
		$this->template->content = View::forge('admin/surveyheaders/edit');

	}

	public function action_delete($id = null)
	{
		if ($surveyheader = Model_Surveyheader::find($id))
		{
			$surveyheader->delete();

			Session::set_flash('success', e('Deleted surveyheader #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete surveyheader #'.$id));
		}

		Response::redirect('admin/surveyheaders');

	}

}
