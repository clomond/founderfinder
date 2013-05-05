<?php

class Api_User_Controller extends Base_Controller {

	/**
	 * The layout being used by the controller.
	 *
	 * @var string
	 */
	
	/**
	 * Indicates if the controller uses RESTful routing.
	 *
	 * @var bool
	 */
	public $restful = true;


	/**
	 * Create a new user.
	 *
	 * @return Response
	 */
	
	public function post_login()
	{
			$userdata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);

			if ( Auth::attempt($userdata) )
			{
				return json_encode(Auth::user());
			}
			else
			{
				var_dump($userdata);
				return json_encode("Error in authenticating user:");
			}
	}

	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'username' => array('required', 'unique:users'),
			'password' => array('required'),
		));

		# entered data for username and password
		if($validation->valid())
		{
			$user = new User;

			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));

			$user->save();
			Auth::login($user->id);
			//Session::flash('message', 'Added user #'.$user->id);

			/* Creating Profile */
			$this->create_profile($user->id);			

			return true;//Redirect::to('profiles');
		}

		else
		{
			return json_encode("Invalid Signup Credentials");//Redirect::to('users/create')
					//->with_errors($validation->errors)
					//->with_input();
		}
	}

	/**
	 * View a specific user.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$user = User::with(array('profile'))->find($id);

		if(is_null($user))
		{
			return json_encode("id does not represent valid user");
		}
		else
		{
			return json_encode($user);
		}

		//$this->layout->title   = 'Viewing User #'.$id;
		//$this->layout->content = View::make('users.view')->with('user', $user);
	}

	public function get_current()
	{
		if(Auth::guest())
		{
			$new_user = new User;
			return json_encode($new_user);
		}
		else
		{
			return json_encode(Auth::user());
		}

	}

	/**
	 * Show the form to edit a specific user.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$user = User::find($id);

		if(is_null($user))
		{
			return Redirect::to('users');
		}

		$this->layout->title   = 'Editing User';
		$this->layout->content = View::make('users.edit')->with('user', $user);
	}

	/**
	 * Edit a specific user.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'username' => array('required'),
			'password' => array('required'),
		));

		if($validation->valid())
		{
			$user = User::find($id);

			if(is_null($user))
			{
				return Redirect::to('users');
			}

			$user->username = Input::get('username');
			$user->password = Input::get('password');

			$user->save();

			//Session::flash('message', 'Updated user #'.$user->id);

			return Redirect::to('users');
		}

		else
		{
			return Redirect::to('users/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific user.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$user = User::find($id);

		if( ! is_null($user))
		{
			$user->delete();

			Session::flash('message', 'Deleted user #'.$user->id);
		}

		return Redirect::to('users');
	}

	/* ---------------- Adding below this line ---------------------- */

	/**
	 * Create a new profile.
	 *
	 * @return Response
	 */
	public function create_profile($id)
	{
			$profile = new Profile;

			$profile->user_id = $id;
			$profile->about_me = "You don't need to know anything about me";

			$profile->save();
	}
}