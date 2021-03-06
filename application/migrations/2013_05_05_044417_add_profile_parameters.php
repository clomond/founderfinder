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
		    $table->string('name');
		    $table->string('email');
		    $table->string('projects');
		    $table->string('technologies');
		    $table->integer('tech_skill');
		    $table->integer('design_skill');
		    $table->integer('business_skill');
		    $table->string('looking_for');
		    $table->integer('tech_check');
		    $table->integer('design_check');
		    $table->integer('business_check');
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