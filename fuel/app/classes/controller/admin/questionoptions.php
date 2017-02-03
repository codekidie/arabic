<?php
class Controller_Admin_Questionoptions extends Controller_Admin
{

	public function action_index()
	{
		$data['questionoptions'] = Model_Questionoption::find('all');
		$this->template->title = "Questionoptions";
		$this->template->content = View::forge('admin/questionoptions/index', $data);

	}

	public function action_view($id = null)
	{
		$data['questionoption'] = Model_Questionoption::find($id);

		$this->template->title = "Questionoption";
		$this->template->content = View::forge('admin/questionoptions/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Questionoption::validate('create');

			if ($val->run())
			{
				$questionoption = Model_Questionoption::forge(array(
					'question_id' => Input::post('question_id'),
					'option_choice_id' => Input::post('option_choice_id'),
				));

				if ($questionoption and $questionoption->save())
				{
					Session::set_flash('success', e('Added questionoption #'.$questionoption->id.'.'));

					Response::redirect('admin/questionoptions');
				}

				else
				{
					Session::set_flash('error', e('Could not save questionoption.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Questionoptions";
		$this->template->content = View::forge('admin/questionoptions/create');

	}

	public function action_edit($id = null)
	{
		$questionoption = Model_Questionoption::find($id);
		$val = Model_Questionoption::validate('edit');

		if ($val->run())
		{
			$questionoption->question_id = Input::post('question_id');
			$questionoption->option_choice_id = Input::post('option_choice_id');

			if ($questionoption->save())
			{
				Session::set_flash('success', e('Updated questionoption #' . $id));

				Response::redirect('admin/questionoptions');
			}

			else
			{
				Session::set_flash('error', e('Could not update questionoption #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$questionoption->question_id = $val->validated('question_id');
				$questionoption->option_choice_id = $val->validated('option_choice_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('questionoption', $questionoption, false);
		}

		$this->template->title = "Questionoptions";
		$this->template->content = View::forge('admin/questionoptions/edit');

	}

	public function action_delete($id = null)
	{
		if ($questionoption = Model_Questionoption::find($id))
		{
			$questionoption->delete();

			Session::set_flash('success', e('Deleted questionoption #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete questionoption #'.$id));
		}

		Response::redirect('admin/questionoptions');

	}

}
