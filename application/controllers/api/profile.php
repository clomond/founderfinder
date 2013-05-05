<?php

class Api_Profile_Controller extends Base_Controller {


	public $restful = true;

	/**
	 * View all of the profiles.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$profiles = Profile::with(array('user'))->get();

		return json_encode($profiles);		
	}


	/**
	 * Create a new profile.
	 *
	 * @return Response
	 */
	/*public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'name' => array('name'),
			'email' => array('email', 'email'),
			'projects' => array('projects'),
			'technologies' => array('technologies'),
			'tech_skill' => array('tech_skill', 'integer'),
			'design_skill' => array('design_skill', 'integer'),
			'business_skill' => array('business_skill', 'integer'),
			'looking_for' => array('looking_for'),
		));

		if($validation->valid())
		{
			$profile = new Profile;

			$profile->user_id = Input::get('user_id');

			$profile->name = Input::get('name');
			$profile->email = Input::get('email');
			$profile->projects = Input::get('projects');
			$profile->technologies = Input::get('technologies');
			$profile->tech_skill = Input::get('tech_skill');
			$profile->design_skill = Input::get('design_skill');
			$profile->business_skill = Input::get('business_skill');
			$profile->looking_for = Input::get('looking_for');

			$profile->save();

			//Session::flash('message', 'Added profile #'.$profile->id);

			return json_encode($profile);
		}
		else
		{
			return json_encode("Error validating profile");
		}
	}*/

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
			return json_encode("This id is not valid");
		}
		else
		{
			return json_encode($profile->attributes);
		}

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
			'name' => array('name'),
			'email' => array('email', 'email'),
			'projects' => array('projects'),
			'technologies' => array('technologies'),
			'tech_skill' => array('tech_skill', 'integer'),
			'design_skill' => array('design_skill', 'integer'),
			'business_skill' => array('business_skill', 'integer'),
			'looking_for' => array('looking_for'),
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
			$profile->name = Input::get('name');
			$profile->email = Input::get('email');
			$profile->projects = Input::get('projects');
			$profile->technologies = Input::get('technologies');
			$profile->tech_skill = Input::get('tech_skill');
			$profile->design_skill = Input::get('design_skill');
			$profile->business_skill = Input::get('business_skill');
			$profile->looking_for = Input::get('looking_for');

			$profile->save();

			//Session::flash('message', 'Updated profile #'.$profile->id);

			return json_encode($profile);
		}

		else
		{
			return json_encode("The form data did not pass validation");
		}
	}
}