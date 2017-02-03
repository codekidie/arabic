<?php
class Controller_Admin_Answers extends Controller_Admin
{

	public function action_index()
	{
		$data['answers'] = Model_Answer::find('all');
		$this->template->title = "Answers";
		$this->template->content = View::forge('admin/answers/index', $data);

	}

	public function action_view($id = null)
	{
		$data['answer'] = Model_Answer::find($id);

		$this->template->title = "Answer";
		$this->template->content = View::forge('admin/answers/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Answer::validate('create');

			if ($val->run())
			{
				$answer = Model_Answer::forge(array(
					'user_id' => Input::post('user_id'),
					'question_option_id' => Input::post('question_option_id'),
					'answer_numeric' => Input::post('answer_numeric'),
					'answer_text' => Input::post('answer_text'),
					'answer_yn' => Input::post('answer_yn'),
					'unit_of_measure_id' => Input::post('unit_of_measure_id'),
				));

				if ($answer and $answer->save())
				{
					Session::set_flash('success', e('Added answer #'.$answer->id.'.'));

					Response::redirect('admin/answers');
				}

				else
				{
					Session::set_flash('error', e('Could not save answer.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Answers";
		$this->template->content = View::forge('admin/answers/create');

	}

	public function action_edit($id = null)
	{
		$answer = Model_Answer::find($id);
		$val = Model_Answer::validate('edit');

		if ($val->run())
		{
			$answer->user_id = Input::post('user_id');
			$answer->question_option_id = Input::post('question_option_id');
			$answer->answer_numeric = Input::post('answer_numeric');
			$answer->answer_text = Input::post('answer_text');
			$answer->answer_yn = Input::post('answer_yn');
			$answer->unit_of_measure_id = Input::post('unit_of_measure_id');

			if ($answer->save())
			{
				Session::set_flash('success', e('Updated answer #' . $id));

				Response::redirect('admin/answers');
			}

			else
			{
				Session::set_flash('error', e('Could not update answer #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$answer->user_id = $val->validated('user_id');
				$answer->question_option_id = $val->validated('question_option_id');
				$answer->answer_numeric = $val->validated('answer_numeric');
				$answer->answer_text = $val->validated('answer_text');
				$answer->answer_yn = $val->validated('answer_yn');
				$answer->unit_of_measure_id = $val->validated('unit_of_measure_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('answer', $answer, false);
		}

		$this->template->title = "Answers";
		$this->template->content = View::forge('admin/answers/edit');

	}

	public function action_delete($id = null)
	{
		if ($answer = Model_Answer::find($id))
		{
			$answer->delete();

			Session::set_flash('success', e('Deleted answer #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete answer #'.$id));
		}

		Response::redirect('admin/answers');

	}

}
