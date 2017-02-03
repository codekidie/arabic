<?php
class Controller_Admin_Questions extends Controller_Admin
{

	public function action_index()
	{
		$data['questions'] = Model_Question::find('all');
		$this->template->title = "Questions";
		$this->template->content = View::forge('admin/questions/index', $data);

	}

	public function action_view($id = null)
	{
		$data['question'] = Model_Question::find($id);

		$this->template->title = "Question";
		$this->template->content = View::forge('admin/questions/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Question::validate('create');

			if ($val->run())
			{
				$question = Model_Question::forge(array(
					'question_name' => Input::post('question_name'),
					'question_subtext' => Input::post('question_subtext'),
					'answer' => Input::post('answer'),
					'option_group_id' => Input::post('option_group_id'),
					'allow_multiple_option_answers' => Input::post('allow_multiple_option_answers'),
				));

				if ($question and $question->save())
				{
					Session::set_flash('success', e('Added question #'.$question->id.'.'));

					Response::redirect('admin/questions');
				}

				else
				{
					Session::set_flash('error', e('Could not save question.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Questions";
		$this->template->content = View::forge('admin/questions/create');

	}

	public function action_edit($id = null)
	{
		$question = Model_Question::find($id);
		$val = Model_Question::validate('edit');

		if ($val->run())
		{
			$question->question_name = Input::post('question_name');
			$question->question_subtext = Input::post('question_subtext');
			$question->answer = Input::post('answer');
			$question->option_group_id = Input::post('option_group_id');
			$question->allow_multiple_option_answers = Input::post('allow_multiple_option_answers');

			if ($question->save())
			{
				Session::set_flash('success', e('Updated question #' . $id));

				Response::redirect('admin/questions');
			}

			else
			{
				Session::set_flash('error', e('Could not update question #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$question->question_name = $val->validated('question_name');
				$question->question_subtext = $val->validated('question_subtext');
				$question->answer = $val->validated('answer');
				$question->option_group_id = $val->validated('option_group_id');
				$question->allow_multiple_option_answers = $val->validated('allow_multiple_option_answers');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('question', $question, false);
		}

		$this->template->title = "Questions";
		$this->template->content = View::forge('admin/questions/edit');

	}

	public function action_delete($id = null)
	{
		if ($question = Model_Question::find($id))
		{
			$question->delete();

			Session::set_flash('success', e('Deleted question #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete question #'.$id));
		}

		Response::redirect('admin/questions');

	}

}
