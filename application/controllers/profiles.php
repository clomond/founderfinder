<?php

class Profiles_Controller extends Base_Controller {

	/**
	 * The layout being used by the controller.
	 *
	 * @var string
	 */
	public $layout = 'layouts.scaffold';

	/**
	 * Indicates if the controller uses RESTful routing.
	 *
	 * @var bool
	 */
	public $restful = true;

	/**
	 * View all of the profiles.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$profiles = Profile::with(array('user'))->get();

		$this->layout->title   = 'Profiles';
		$this->layout->content = View::make('profiles.index')->with('profiles', $profiles);
	}

	/**
	 * Show the form to create a new profile.
	 *
	 * @return void
	 */
	public function get_create($user_id = null)
	{
		$this->layout->title   = 'New Profile';
		$this->layout->content = View::make('profiles.create', array(
									'user_id' => $user_id,
								));
	}

	/**
	 * Create a new profile.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'about_me' => array('required'),
		));

		if($validation->valid())
		{
			$profile = new Profile;

			$profile->user_id = Input::get('user_id');
			$profile->about_me = Input::get('about_me');

			$profile->save();

			Session::flash('message', 'Added profile #'.$profile->id);

			return Redirect::to('profiles');
		}

		else
		{
			return Redirect::to('profiles/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific profile.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$profile = Profile::with(array('user'))->find($id);

		if(is_null($profile))
		{
			return Redirect::to('profiles');
		}

		$this->layout->title   = 'Viewing Profile #'.$id;
		$this->layout->content = View::make('profiles.view')->with('profile', $profile);
	}

	/**
	 * Show the form to edit a specific profile.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$profile = Profile::find($id);

		if(is_null($profile))
		{
			return Redirect::to('profiles');
		}

		$this->layout->title   = 'Editing Profile';
		$this->layout->content = View::make('profiles.edit')->with('profile', $profile);
	}

	/**
	 * Edit a specific profile.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'about_me' => array('required'),
		));

		if($validation->valid())
		{
			$profile = Profile::find($id);

			if(is_null($profile))
			{
				return Redirect::to('profiles');
			}

			$profile->user_id = Input::get('user_id');
			$profile->about_me = Input::get('about_me');

			$profile->save();

			Session::flash('message', 'Updated profile #'.$profile->id);

			return Redirect::to('profiles');
		}

		else
		{
			return Redirect::to('profiles/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific profile.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$profile = Profile::find($id);

		if( ! is_null($profile))
		{
			$profile->delete();
	
			Session::flash('message', 'Deleted profile #'.$profile->id);
		}
	
		return Redirect::to('profiles');
	}
}