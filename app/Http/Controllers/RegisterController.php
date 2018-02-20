<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function register(Register $request){

        $user = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
        	'email' => $request->email,
            'password' => bcrypt($request->password),
            'accepted_terms' => $request->accepted_terms
    	]);
    	return $user;
    }
}
?>
