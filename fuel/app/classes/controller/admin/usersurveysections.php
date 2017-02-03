<?php
class Controller_Admin_Usersurveysections extends Controller_Admin
{

	public function action_index()
	{
		$data['usersurveysections'] = Model_Usersurveysection::find('all');
		$this->template->title = "Usersurveysections";
		$this->template->content = View::forge('admin/usersurveysections/index', $data);

	}

	public function action_view($id = null)
	{
		$data['usersurveysection'] = Model_Usersurveysection::find($id);

		$this->template->title = "Usersurveysection";
		$this->template->content = View::forge('admin/usersurveysections/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Usersurveysection::validate('create');

			if ($val->run())
			{
				$usersurveysection = Model_Usersurveysection::forge(array(
					'userid' => Input::post('userid'),
					'surveysectionid' => Input::post('surveysectionid'),
					'completed_on' => Input::post('completed_on'),
				));

				if ($usersurveysection and $usersurveysection->save())
				{
					Session::set_flash('success', e('Added usersurveysection #'.$usersurveysection->id.'.'));

					Response::redirect('admin/usersurveysections');
				}

				else
				{
					Session::set_flash('error', e('Could not save usersurveysection.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Usersurveysections";
		$this->template->content = View::forge('admin/usersurveysections/create');

	}

	public function action_edit($id = null)
	{
		$usersurveysection = Model_Usersurveysection::find($id);
		$val = Model_Usersurveysection::validate('edit');

		if ($val->run())
		{
			$usersurveysection->userid = Input::post('userid');
			$usersurveysection->surveysectionid = Input::post('surveysectionid');
			$usersurveysection->completed_on = Input::post('completed_on');

			if ($usersurveysection->save())
			{
				Session::set_flash('success', e('Updated usersurveysection #' . $id));

				Response::redirect('admin/usersurveysections');
			}

			else
			{
				Session::set_flash('error', e('Could not update usersurveysection #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$usersurveysection->userid = $val->validated('userid');
				$usersurveysection->surveysectionid = $val->validated('surveysectionid');
				$usersurveysection->completed_on = $val->validated('completed_on');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('usersurveysection', $usersurveysection, false);
		}

		$this->template->title = "Usersurveysections";
		$this->template->content = View::forge('admin/usersurveysections/edit');

	}

	public function action_delete($id = null)
	{
		if ($usersurveysection = Model_Usersurveysection::find($id))
		{
			$usersurveysection->delete();

			Session::set_flash('success', e('Deleted usersurveysection #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete usersurveysection #'.$id));
		}

		Response::redirect('admin/usersurveysections');

	}

}
