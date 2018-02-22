<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GalleriesController extends Controller
{
   
    public function findId()
    {
        return User::findId;
    }


}


