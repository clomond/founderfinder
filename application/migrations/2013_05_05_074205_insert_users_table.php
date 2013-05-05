<?php

class Insert_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		
	/* Author: Ankita Kulkarni */
	//DB::table('users')->insert(array('username' => 'admin'),'password' => Hash::make('password'));
	DB::table('users')->insert(
	array('username' => 'admin',
			'password' => Hash::make('password'),
			'email' => 'admin@gmail.com'
));

		DB::table('users')->insert(
	array('username' => 'admin1',
			'password' => Hash::make('password'),
			'email' => 'admin1@gmail.com'
));
			DB::table('users')->insert(
	array('username' => 'admin2',
			'password' => Hash::make('password'),
			'email' => 'admin2@gmail.com'
));
				DB::table('users')->insert(
	array('username' => 'admin3',
			'password' => Hash::make('password'),
			'email' => 'admin3@gmail.com'
));
					DB::table('users')->insert(
	array('username' => 'admin4',
			'password' => Hash::make('password'),
			'email' => 'admin4@gmail.com'
));
						DB::table('users')->insert(
	array('username' => 'admin5',
			'password' => Hash::make('password'),
			'email' => 'admin5@gmail.com'
));
							DB::table('users')->insert(
	array('username' => 'admin6',
			'password' => Hash::make('password'),
			'email' => 'admin6@gmail.com'
));
								DB::table('users')->insert(
	array('username' => 'admin7',
			'password' => Hash::make('password'),
			'email' => 'admin7@gmail.com'
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