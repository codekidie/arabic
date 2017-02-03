<?php
class Controller_Admin_Surveycomments extends Controller_Admin
{

	public function action_index()
	{
		$data['surveycomments'] = Model_Surveycomment::find('all');
		$this->template->title = "Surveycomments";
		$this->template->content = View::forge('admin/surveycomments/index', $data);

	}

	public function action_view($id = null)
	{
		$data['surveycomment'] = Model_Surveycomment::find($id);

		$this->template->title = "Surveycomment";
		$this->template->content = View::forge('admin/surveycomments/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Surveycomment::validate('create');

			if ($val->run())
			{
				$surveycomment = Model_Surveycomment::forge(array(
					'user_id' => Input::post('user_id'),
					'survey_header_id' => Input::post('survey_header_id'),
					'comments' => Input::post('comments'),
				));

				if ($surveycomment and $surveycomment->save())
				{
					Session::set_flash('success', e('Added surveycomment #'.$surveycomment->id.'.'));

					Response::redirect('admin/surveycomments');
				}

				else
				{
					Session::set_flash('error', e('Could not save surveycomment.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Surveycomments";
		$this->template->content = View::forge('admin/surveycomments/create');

	}

	public function action_edit($id = null)
	{
		$surveycomment = Model_Surveycomment::find($id);
		$val = Model_Surveycomment::validate('edit');

		if ($val->run())
		{
			$surveycomment->user_id = Input::post('user_id');
			$surveycomment->survey_header_id = Input::post('survey_header_id');
			$surveycomment->comments = Input::post('comments');

			if ($surveycomment->save())
			{
				Session::set_flash('success', e('Updated surveycomment #' . $id));

				Response::redirect('admin/surveycomments');
			}

			else
			{
				Session::set_flash('error', e('Could not update surveycomment #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$surveycomment->user_id = $val->validated('user_id');
				$surveycomment->survey_header_id = $val->validated('survey_header_id');
				$surveycomment->comments = $val->validated('comments');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('surveycomment', $surveycomment, false);
		}

		$this->template->title = "Surveycomments";
		$this->template->content = View::forge('admin/surveycomments/edit');

	}

	public function action_delete($id = null)
	{
		if ($surveycomment = Model_Surveycomment::find($id))
		{
			$surveycomment->delete();

			Session::set_flash('success', e('Deleted surveycomment #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete surveycomment #'.$id));
		}

		Response::redirect('admin/surveycomments');

	}

}
