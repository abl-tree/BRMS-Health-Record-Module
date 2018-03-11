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
        $persons = Person::all();
        $data = array();
        
        foreach ($persons as $person) {
            $data[] = array(
                'id' => $person->id, 
                'first_name' => $person->firstName, 
                'middle_name' => $person->midName, 
                'last_name' => $person->lastName, 
                'gender' => $person->gender, 
                'address' => $person->address, 
            );
        }

        return \DataTables::of($data)->make(true);
    }
}