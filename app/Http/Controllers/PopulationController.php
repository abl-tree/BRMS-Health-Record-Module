<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PopulationController extends Controller
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
        //return view('pages/household');
    }

    public function population($option) {
        if($option === 'summary') {
            $population = Person::all();

            $count = array(
                'population' => $population->count(), 
                'male' => $population->where('gender', 'male')->count(), 
                'female' => $population->where('gender', 'female')->count(), 
                'undefined' => $population->where('gender', null)->count(), 
            );

            echo json_encode($count);
        }
    }
}
