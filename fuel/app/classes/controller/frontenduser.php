<?php

class Controller_Frontenduser extends Controller_Template
{

	public function action_index()
	{
		if (Input::method() == 'POST') {
			
			for ($i=0; $i < count($_POST['answer']); $i++) { 

				$inputtype = Model_Answer::forge(array(
				'user_id' => Input::post('user_id'),
				'answer_text' => ucwords($_POST['answer'][$i]),
				'question_option_id' => 1,
				'answer_numeric' => 0,
				'answer_yn' => 0,
				'unit_of_measure_id' => 0,
				));

				if ($inputtype and $inputtype->save())
				{
					Session::set_flash('success', e('Added Answer #'.$inputtype->id.'.'));
					$this->template->title = 'Questionare';
					$data['questionare'] = Model_Question::find('all');
					Response::redirect('frontenduser/index', $data);
				}

				else
				{
					Session::set_flash('error', e('Could not save inputtype.'));
				}

			}
		}else{

			$data['questionare'] = Model_Question::find('all');
			$data["subnav"] = array('index'=> 'active' );
			$this->template->title = 'Questionare';
			$this->template->content = View::forge('frontenduser/index', $data);

		}
		
	}

	public function action_answers()
	{
			$data["subnav"] = array('index'=> 'active' );
			$data['answers'] =  DB::select('*')->from('answers')->where('user_id','=',Auth::get('id'))->execute();
			
			$this->template->title = 'Result Answers';
			$this->template->content = View::forge('frontenduser/answers', $data);
	}

	public function action_logout()
	{
		Auth::logout();
		return Response::forge(View::forge('welcome/index'));
	}

}
