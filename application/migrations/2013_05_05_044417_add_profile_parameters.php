<?php

class Add_Profile_Parameters {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profiles', function($table)
		{
		   // $table->string('first');
		   // $table->string('last');
		   // $table->string('age');
		});
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