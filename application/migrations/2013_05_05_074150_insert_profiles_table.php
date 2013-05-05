<?php

class Insert_Profiles_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		/* Author: Ankita Kulkarni */
	
	DB::table('profiles')->insert(
	array('user_id' => '1',
			'about_me' => 'tech geek',
			'projects' => 'git hub windows 8',
			'technologies' => 'db2,java,html',
			'tech_skill' => 'pro java developer',
			'design_skill' => 'photoshop',
			'business_skill' => '',
			'looking_for' => 'team of 4 members with java skill',
			'tech_check' => '1',
			'design_check' => '0',
			'business_check' => '0'
));
			
	
		DB::table('profiles')->insert(
	array('user_id' => '2',
			'about_me' => 'design interest',
			'projects' => 'blend windows 8',
			'technologies' => 'UX',
			'tech_skill' => 'none',
			'design_skill' => 'photoshop,coral draw',
			'business_skill' => '',
			'looking_for' => 'co-founder for startup',
			'tech_check' => '0',
			'design_check' => '1',
			'business_check' => '0'	
));
	
		DB::table('profiles')->insert(
	array('user_id' => '3',
			'about_me' => 'studyin Waterloo',
			'projects' => 'git hub, windows 8',
			'technologies' => 'db2,java,html',
			'tech_skill' => 'pro java developer',
			'design_skill' => 'photoshop',
			'business_skill' => '',
			'looking_for' => 'team of 4 members with java skill',
			'tech_check' => '1',
			'design_check' => '0',
			'business_check' => '0'	
));
	
		DB::table('profiles')->insert(
	array('user_id' => '4',
			'about_me' => 'love music. like to make music app',
			'projects' => 'git hub, windows 8',
			'technologies' => 'db2,java,html',
			'tech_skill' => 'pro java developer',
			'design_skill' => 'photoshop',
			'business_skill' => '',
			'looking_for' => 'team of 4 members with java skill',
			'tech_check' => '1',
			'design_check' => '0',
			'business_check' => '0'	
));
		DB::table('profiles')->insert(
	array('user_id' => '5',
			'about_me' => 'hardware specialist& Business student ',
			'projects' => 'git hub, windows 8',
			'technologies' => '',
			'tech_skill' => '',
			'design_skill' => '',
			'business_skill' => 'presentation skill',
			'looking_for' => 'team of 3 members for casecomp',
			'tech_check' => '0',
			'design_check' => '0',
			'business_check' => '1'	
));
	
		DB::table('profiles')->insert(
	array('user_id' => '6',
			'about_me' => 'simon fraser univ',
			'projects' => 'git hub, windows 8,android,app dev',
			'technologies' => '.Net Visual basic',
			'tech_skill' => 'pro db2 developer',
			'design_skill' => '',
			'business_skill' => '',
			'looking_for' => 'talent fsor business, technical conference ',
			'tech_check' => '1',
			'design_check' => '0',
			'business_check' => '0'	
));
	
		DB::table('profiles')->insert(
	array('user_id' => '7',
			'about_me' => 'interested in only hackathons',
			'projects' => 'facebook hackathons',
			'technologies' => 'db2,java,html,php',
			'tech_skill' => 'pro java developer',
			'design_skill' => 'photoshop',
			'business_skill' => '',
			'looking_for' => 'team of 4 members with java skill',
			'tech_check' => '1',
			'design_check' => '0',
			'business_check' => '0'	
));
	
		DB::table('profiles')->insert(
	array('user_id' => '8',
			'about_me' => 'interested in hackathons',
			'projects' => 'facebook hackathons',
			'technologies' => 'db2,java,html,php',
			'tech_skill' => 'pro java developer',
			'design_skill' => 'photoshop',
			'business_skill' => '',
			'looking_for' => 'team of 4 members with java skill',
			'tech_check' => '1',
			'design_check' => '0',
			'business_check' => '0'	
));
	
		DB::table('profiles')->insert(
	array('user_id' => '9',
			'about_me' => 'university student',
			'projects' => 'ibm hackathons, github,linkedin hack',
			'technologies' => 'java, jsf, jquery',
			'tech_skill' => 'low',
			'design_skill' => '',
			'business_skill' => '',
			'looking_for' => 'startup requires people',
			'tech_check' => '1',
			'design_check' => '1',
			'business_check' => '0'	
));	
	
	}
		
	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}