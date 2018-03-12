<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserProfile;
use App\BrgyInfo;
use App\AccountRole;
use App\Person;


class ProfileController extends Controller
{
    protected $db_connection;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        $this->db_connection = config('database.default');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::all();

        return view('pages/user_profile');
    }

    public function profile() {
        $users = User::all();
        $data = array();
        
        foreach ($users as $user) {
            $data[] = array(
                'id' => $user->id, 
                'fullname' => $user->profiles->first_name.' '.$user->profiles->last_name, 
                'username' => $user->username, 
                'role' => $user->roles->role, 
                'created_at' => $user->created_at, 
            );
        }

        return \DataTables::of($data)->make(true);
    }
     
}