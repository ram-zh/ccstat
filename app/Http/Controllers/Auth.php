<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Illuminate\Support\Facades\DB;

class Auth extends Controller {

	public function login(Request $request) {
		
		if ($request->method() == 'POST') {
			$login = $request->login;
			$password = $request->password;
			$dbAuth = false;

			$dbAuth = AuthFacade::attempt(['Email' => $login, 'password' => $password, 'Enabled' => 1]);
			
			if (!$dbAuth) {
				// Attempt LDAP auth
				// $existingUser = User
			}
		}
		
		return view('auth.login');
	}

}
