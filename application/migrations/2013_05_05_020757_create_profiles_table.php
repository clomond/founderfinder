<?php

class Create_Profiles_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('profiles', function($table)
		{
			$table->increments('id');

			$table->integer('user_id');
			$table->string('about_me');

			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}