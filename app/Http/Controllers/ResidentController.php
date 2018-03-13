<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class ResidentController extends Controller
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
        return view('pages/resident');
    }

    public function profile() {        
        $persons = Person::all();
        $data = array();
        
        foreach ($persons as $person) {
            if($this->db_connection === 'pgsql') {
                $data[] = array(
                    'id' => $person->id, 
                    'first_name' => $person->firstname, 
                    'middle_name' => $person->midname, 
                    'last_name' => $person->lastname, 
                    'gender' => $person->gender, 
                    'address' => $person->address, 
                );
            } else {
                $data[] = array(
                    'id' => $person->id, 
                    'first_name' => $person->firstName, 
                    'middle_name' => $person->midName, 
                    'last_name' => $person->lastName, 
                    'gender' => $person->gender, 
                    'address' => $person->address, 
                );
            }
        }

        return \DataTables::of($data)->make(true);
    }
    public function showPerson()
     {
    $data = DB::table('persons')->get();
    return View::make("pages/resident", compact('persons'));
     }
}