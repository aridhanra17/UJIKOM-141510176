<?php

namespace App\Http\Controllers;

use Request;
use App\User;

class user_controller extends Controller
{
	public function __construct()
    {
        $this->middleware('SuperAdmin');
    }
    public function index()
    {
    	$user = User::all();
        return view('users.user', compact('user'));
    }
}
