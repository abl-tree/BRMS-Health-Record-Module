<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Person;
use Auth;
 

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

    public function store(Request $request){

            $person = new Person;
            $person->userId = "0";
            $person->brgyId = "0";
            $person->address = "";
            $person->placeOfBirth = "";
            $person->religion = "";
            $person->nationality = "";
            $person->highestEducationalAttainment = "";

            $person->numberOfYearsInSchool = "";
            $person->occupationPriorToCBRAP = "";
            $person->siblings = "";
            $person->ordinalPosition = "";
            $person->livingArrangements = "";
            $person->monthlyIncome = "";
            $person->skills = "";
            $person->father = "";
            $person->occupationFather = "";
            $person->mother = "";
            $person->occupationMother = "";
            $person->spouse = "";
            $person->occupationSpouse = "";
            $person->spouseAddress = "";
            $person->numberOfChildren = "";
            $person->firstName = $request->get('first_name');
            $person->midName = $request->get('middle_name');
            $person->lastName = $request->get('last_name');
            $person->gender = $request->get('gender');
            $person->purok = $request->get('purok');
            $person->street = $request->get('street');
            $person->barangay = $request->get('barangay');
            $person->city = $request->get('city');
            $person->dob = $request->get('birthdate');
            $person->civilStatus = $request->get('marital_status');
            $person->height = $request->get('height');
            $person->weight = $request->get('weight');
            $person->blood_type = $request->get('blood_type');
            $person->contact_number = $request->get('contact_number');
            $person->email = $request->get('email');
            $person->inname = $request->get('emergency_name');
            $person->contact = $request->get('emergency_contact');
            $person->relationship = $request->get('emergency_relationship');
            $person->save();

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
                $person->bloodtype = $request->get('blood_type');
                $person->contact = $request->get('contact_number');
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
                    'purok' => $person->purok,
                    'barangay' => $person->barangay,
                    'street' => $person->street,
                    'city' => $person->city,
                );
            } else {
                $data[] = array(
                    'id' => $person->id,
                    'first_name' => $person->firstName,
                    'middle_name' => $person->midName,
                    'last_name' => $person->lastName,
                    'gender' => $person->gender,
                    'purok' => $person->purok,
                    'barangay' => $person->barangay,
                    'street' => $person->street,
                    'city' => $person->city,
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
            'contact' => $person->contact_number,
            'btype' => $person->blood_type,
        );
        echo json_encode($output);
    }

    public function updateResident(Request $request){ 
                $check = array();
                $validator = Validator::make($request->all(), [
                'id'                    => 'required',    
                'firstname'             => 'required',
                'midname'               => 'required',
                'lastname'              => 'required',
                'civStatus'             => 'required',                
                'gender'                => 'required',
                'address'               => 'required',
                'bday'                  => 'required',
                'height'                => 'required',
                'weight'                => 'required',
                'btype'                 => 'required',
                'contact'               => 'required',
                'email'                 => 'required'

            ]);    
              
                $data = Person::where('id', $request->id)->first();
                $data->firstName = $request->firstname;
                $data->midName = $request->midname;
                $data->lastName = $request->lastname;
                $data->civilStatus = $request->civStatus;
                $data->dob = date("Y-m-d", strtotime($request->bday));
                $data->height = $request->height;
                $data->gender = $request->gender;
                $data->address = $request->address;
                $data->weight = $request->weight;
                $data->blood_type = $request->btype;
                $data->contact_number = $request->contact;
                $data->email = $request->email;
                $residentsaved= $data->save();

        if(!$residentsaved){
            $check = array(
                'success' => false, 
                'message' => 'Something went wrong!');
        } else {
            $check = array(
                'success' => true, 
                'message' => 'Resident has been updated successfully.');
        }

        echo json_encode($check);
        }
}
