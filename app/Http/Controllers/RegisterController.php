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
            'last_name' => $request->firstName,
        	'email' => $request->email,
        	'password' => bcrypt($request->password)
    	]);
    	return $user;
    }
}
?>
