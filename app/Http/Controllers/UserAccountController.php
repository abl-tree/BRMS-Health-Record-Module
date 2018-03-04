<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserProfile;
use App\BrgyInfo;

class UserAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::all();

        return view('pages/user_account', compact('users'));
    }

    public function test() {
    	$users = User::all();
    	$data = array();

    	if($users) {
    		foreach ($users as $key => $value) {
    			$data[$key][] = $users[$key]->profile()->first()->first_name;
    			$data[$key][] = $users[$key]->profile()->first()->middle_name;
    			$data[$key][] = $users[$key]->profile()->first()->last_name;
    		}

    		echo json_encode($data);
    	}
    }
}