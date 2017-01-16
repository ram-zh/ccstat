<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Auth\Passwords\CanResetPassword;
// use Illuminate\Foundation\Auth\Access\Authorizable;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
// use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Base\User implements AuthenticatableContract /*, AuthorizableContract, CanResetPasswordContract */ {

	use Authenticatable /* , Authorizable, CanResetPassword */;

	protected $hidden = [
		'password', 'remember_token',
	];

	public function getAuthPassword() {
		return $this->Password;
	}

}
