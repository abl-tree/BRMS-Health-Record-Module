<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseholdController extends Controller
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
        return view('pages/household');
    }
}