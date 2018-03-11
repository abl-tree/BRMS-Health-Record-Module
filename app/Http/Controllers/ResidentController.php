<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class ResidentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/resident');
    }

    public function profile() {        
        $person = Person::all();
        return \DataTables::of(Person::query())->make(true);
    }
}