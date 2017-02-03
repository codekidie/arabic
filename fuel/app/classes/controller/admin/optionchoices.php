<?php
class Controller_Admin_Optionchoices extends Controller_Admin
{

	public function action_index()
	{
		$data['optionchoices'] = Model_Optionchoice::find('all');
		$this->template->title = "Optionchoices";
		$this->template->content = View::forge('admin/optionchoices/index', $data);

	}

	public function action_view($id = null)
	{
		$data['optionchoice'] = Model_Optionchoice::find($id);

		$this->template->title = "Optionchoice";
		$this->template->content = View::forge('admin/optionchoices/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Optionchoice::validate('create');

			if ($val->run())
			{
				$optionchoice = Model_Optionchoice::forge(array(
					'optiongroupid' => Input::post('optiongroupid'),
					'option_choice_name' => Input::post('option_choice_name'),
				));

				if ($optionchoice and $optionchoice->save())
				{
					Session::set_flash('success', e('Added optionchoice #'.$optionchoice->id.'.'));

					Response::redirect('admin/optionchoices');
				}

				else
				{
					Session::set_flash('error', e('Could not save optionchoice.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Optionchoices";
		$this->template->content = View::forge('admin/optionchoices/create');

	}

	public function action_edit($id = null)
	{
		$optionchoice = Model_Optionchoice::find($id);
		$val = Model_Optionchoice::validate('edit');

		if ($val->run())
		{
			$optionchoice->optiongroupid = Input::post('optiongroupid');
			$optionchoice->option_choice_name = Input::post('option_choice_name');

			if ($optionchoice->save())
			{
				Session::set_flash('success', e('Updated optionchoice #' . $id));

				Response::redirect('admin/optionchoices');
			}

			else
			{
				Session::set_flash('error', e('Could not update optionchoice #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$optionchoice->optiongroupid = $val->validated('optiongroupid');
				$optionchoice->option_choice_name = $val->validated('option_choice_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('optionchoice', $optionchoice, false);
		}

		$this->template->title = "Optionchoices";
		$this->template->content = View::forge('admin/optionchoices/edit');

	}

	public function action_delete($id = null)
	{
		if ($optionchoice = Model_Optionchoice::find($id))
		{
			$optionchoice->delete();

			Session::set_flash('success', e('Deleted optionchoice #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete optionchoice #'.$id));
		}

		Response::redirect('admin/optionchoices');

	}

}
