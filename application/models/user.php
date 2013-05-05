<?php

class User extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'users';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = true;

	/**
	 * Establish the relationship between a user and a profile.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_One
	 */
	public function profile()
	{
		return $this->has_one('Profile');
	}
}