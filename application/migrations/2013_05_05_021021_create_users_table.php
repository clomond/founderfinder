<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('users', function($table)
		{
			$table->increments('id');

			$table->string('username');
			$table->string('password');

			$table->timestamps();
		});
	}

	/* Author: Matt Stokes */
//	DB::table('users')->int(array(
//	'username' 	=> 'admin',
//	'password' => 'password'
//	)); 

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}