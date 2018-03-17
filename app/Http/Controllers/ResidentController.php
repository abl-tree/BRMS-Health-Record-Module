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

    public function store(Request $request)
        {

            if($request->get('button_action') == 'update'){
                $person = Person::find($request->get('id'));
                $person->firstName = $request->get('firstname');
                $person->midName = $request->get('midname');
                $person->lastName = $request->get('lastname');
                $person->gender = $request->get('gender');
                $person->address = $request->get('address');
                $person->dob = $request->get('bday');
                $person->civilStatus = $request->get('civStatus');
                $person->height = $request->get('height');
                $person->weight = $request->get('weight');
                $person->bloodtype = $request->get('btype');
                $person->contact = $request->get('contactnumber');
                $person->email = $request->get('email');
                $person->save();
            }
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

    function updatedata(Request $request){
        $id = $request->input('id');
        $person = Person::find($id);
        $output = array(
            'firstName' => $person->firstName,
            'midName' => $person->midName,
            'lastName' => $person->lastName,
            'gender' => $person->gender,
            'address' => $person->address,
            'dob' => $person->dob,
            'civilStatus' => $person->civilStatus,
            'height' => $person->height,
            'weight' => $person->weight,
            'email' => $person->email,
            'contactnumber' => $person->contactnumber,
            'bloodtype' => $person->bloodtype,
        );
        echo json_encode($output);
    }
}
