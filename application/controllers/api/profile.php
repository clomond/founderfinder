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
		//$profiles = Profile::with(array('user'))->get();
		$profiles = $this->get_algorithm();
		return json_encode($profiles);		
	}


	public function cmp($a, $b)
	{
    	{
    if ($a['score'] == $b['score']) {
        return 0;
    }
    return ($a['score'] < $b['score']) ? 1 : -1;
}
	}

	public function skill_max($tech, $business, $design)
	{
		if($tech > $business && $tech > $design)
		{
			return "Technology";
		}
		elseif($business > $tech && $business > $design)
		{
			return "Business";
		}
		else
		{
			return "Design";
		}
	}

	public function get_algorithm($tech_check=1, $business_check=0, $design_check=0)
	{
		$found = Profile::with(array('user'))->get();//DB::table('profiles')->get();
		//$arr = array();
		
		$i=0;
		while($i < sizeof($found)) //loop through all profiles
		{
			$arr[$i]['id'] = $found[$i]->id;
			$arr[$i]['name'] = $found[$i]->name;
			$arr[$i]['email'] = $found[$i]->email;
			$arr[$i]['technologies'] = $found[$i]->technologies;

			$arr[$i]['focus'] = $this->skill_max($found[$i]->tech_skill, $found[$i]->business_skill, $found[$i]->design_check);
			$arr[$i]['score'] = $found[$i]->tech_skill * $tech_check + $found[$i]->business_skill * $business_check + $found[$i]->design_skill * $design_check;
			$i = $i + 1;
		}

		uasort($arr, array($this,"cmp"));

		$i = 0;
		while($i < 10 && $i < sizeof($arr))
		{
			$output[$i] = $arr[$i];
			$i = $i + 1;
		}
		return $output;	
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