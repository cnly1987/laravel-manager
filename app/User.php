<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

	use EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * @param $value
	 */
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

	/**
	 * @return mixed
	 */
	public function getLevelMax()
	{
		$roles = [];
		foreach($this->roles as $role)
		{
			$roles[] = $role->level;
		}

		return max($roles);
	}

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [
		'email' => 'required|email',
	];


}
