<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		if (Input::method() == 'POST')
		{
			if (isset($_POST['login'])) {
				if (Auth::login(Input::post('username'), Input::post('password')))
				{
					// assign the user id that lasted updated this record
					foreach (\Auth::verified() as $driver)
					{
						

						if (($id = $driver->get_user_id()) !== false)
						{
							// credentials ok, go right in
							$current_user = Model\Auth_User::find($id[1]);
							$role = $current_user->group;
							if ($role == 100) {
								Session::set_flash('success', e('Welcome, '.$current_user->username));
							 	Response::redirect('admin');
							 	
							}elseif ($role == 50) {
								Session::set_flash('success', e('Welcome, '.$current_user->username));
							 	Response::redirect('frontenduser/index');
							}
							elseif ($role == 1) {
								Session::set_flash('success', e('Welcome, '.$current_user->username));
							 	Response::redirect('frontenduser/index');
							}
							
						}
					}
				}
				else
				{
					Session::set_flash('error', e('Username or Password Mismatch!'));
				   return Response::forge(View::forge('welcome/index'));

				}
			}

			if (isset($_POST['register'])) {
			   $user = 	Auth::create_user(
				    Input::post('username'), 
				    Input::post('password'),
				     Input::post('email'),
				    1,
				    array(
				        'fullname' => Input::post('fullname'),
				    )
				);

			   if ($user) {
			   		Session::set_flash('success', e('Registration Success!'));
					Response::redirect('welcome/index');
			   }else{
			   		Session::set_flash('error', e('Registration Error Something Went Wrong!'));
					Response::redirect('welcome/index');

			   }
			}
		}
		else{
			return Response::forge(View::forge('welcome/index'));
		}	
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(Presenter::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
