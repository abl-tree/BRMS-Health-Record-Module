<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Person;
use App\mch;
use App\pp;
use App\walkin;
use App\epi;
use App\fp;
use App\ufc;

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
        }

    public function profile() {
        $persons = Person::all();
        $data = array();

        foreach ($persons as $person) {
            if($this->db_connection === 'pgsql') {
                $data[] = array(
                    'id' => $person->id,
                    'first_name' => $person->firstName,
                    'middle_name' => $person->midName,
                    'last_name' => $person->lastName,
                    'email' => $person->email,
                    'weight' => $person->weight,
                    'height' => $person->height,
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
                    'email' => $person->email,
                    'weight' => $person->weight,
                    'height' => $person->height,
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
            'purok' => $person->purok,
            'barangay' => $person->barangay,
            'street' => $person->street,
            'city' => $person->city,
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
                'barangay'               => 'required',
                'purok'               => 'required',
                'street'               => 'required',
                'city'               => 'required',
                'bday'                  => 'required',
                'height'                => 'required',
                'weight'                => 'required',
                'btype'                 => 'required',
                'contact'               => 'required',
                'email'                 => 'required',
            ]);    
              if($validator->fails()){
                 $check = array(
                    'success' => false, 
                    'message' => $validator->errors());
             }else{
                $data = Person::where('id', $request->id)->first();
                if($data){
                $data->firstName = $request->firstname;
                $data->midName = $request->midname;
                $data->lastName = $request->lastname;
                $data->civilStatus = $request->civStatus;
                $data->dob = date("Y-m-d", strtotime($request->bday));
                $data->height = $request->height;
                $data->gender = $request->gender;
                $data->purok = $request->purok;
                $data->barangay = $request->barangay;
                $data->street = $request->street;
                $data->city = $request->city;
                $data->weight = $request->weight;
                $data->blood_type = $request->btype;
                $data->contact_number = $request->contact;
                $data->email = $request->email;
                $residentsaved= $data->save();
            }
                $check = array(
                'success' => true, 
                'message' => 'Resident has been updated successfully.');
            }
        echo json_encode($check);
        }
        
    public function addMch(Request $request){

        $mch = new mch;
        $mch->mch_id = $request->get('id_mch');
        $mch->age = $request->get('age');
        $mch->g = $request->get('g');
        $mch->p = $request->get('p');
        $mch->rcode = $request->get('rcode');
        $mch->level = $request->get('level');
        $mch->range = $request->get('range');
        $mch->lmp = $request->get('lmp');
        $mch->edc = $request->get('edc');
        $mch->remarks = $request->get('remarks');
        $mch->save();
    }

    public function addPp(Request $request){

        $pp = new pp;
        $pp->pp_id = $request->get('id_pp');
        $pp->age = $request->get('age');
        $pp->PlaceofDelivery = $request->get('POdelivery');
        $pp->attended_by = $request->get('attendee');
        $pp->gender = $request->get('gender');
        $pp->fdg = $request->get('fdg');
        $pp->weight = $request->get('weight');
        $pp->date_of_pp = $request->get('date');
        $pp->vitamina = $request->get('vita');
        $pp->dod = $request->get('DOdelivery');
        $pp->F = $request->get('f');
        $pp->save();
    }
    public function addWalkin(Request $request){

        $walkin = new walkin;
        $walkin->walkin_id = $request->get('walkin_id');
        $walkin->blood_pressure = $request->get('bp');
        $walkin->blood_sugar = $request->get('bs');
        $walkin->consultation = $request->get('consultation');
        $walkin->findings = $request->get('findings');
        $walkin->notes = $request->get('notes');
        $walkin->medicine = $request->get('med');
        $walkin->med_quantity = $request->get('quantity');
        $walkin->save();
    }
    public function addepi(Request $request){

        $epi = new epi;
        $epi->epi_id = $request->get('epi_id');
        $epi->age = $request->get('age');
        $epi->mother_name = $request->get('mn');
        $epi->father_name = $request->get('fn');
        $epi->fdg = $request->get('fdg');
        $epi->weight = $request->get('weight');
        $epi->r_code = $request->get('r_code');
        $epi->vaccine = $request->get('vaccine');
        $epi->save();
    }
    public function addufc(Request $request){

        $ufc = new ufc;
        $ufc->ufc_id = $request->get('ufc_id');
        $ufc->age = $request->get('age');
        $ufc->mother_name = $request->get('mn');
        $ufc->father_name = $request->get('fn');
        $ufc->fdg = $request->get('fdg');
        $ufc->weight = $request->get('weight');
        $ufc->r_code = $request->get('r_code');
        $ufc->remarks = $request->get('remarks');
        $ufc->save();
    }
    public function addfp(Request $request){

        $fp = new fp;
        $fp->fp_id = $request->get('fp_id');
        $fp->age = $request->get('age');
        $fp->num_child = $request->get('num_child');
        $fp->lmp = $request->get('lmp1');
        $fp->client_type = $request->get('client_type');
        $fp->method_accepted = $request->get('method_accepted');
        $fp->remarks = $request->get('remarks');
        $fp->save();
    }
}
