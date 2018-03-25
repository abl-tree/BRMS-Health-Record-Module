<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanitationTypes;
use App\SanitationOption;

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
        $sanitations = SanitationTypes::all();

        return view('pages/household', compact('sanitations'));
    }

    public function member(Request $request, $option = null) 
    {
        $session_member = session('member');
        $data = array();

        if($option === 'add') {        
            $data = array(
                'id' => count($session_member),
                'last_name' => ucwords($request->member_lastname),
                'first_name' => ucwords($request->member_firstname),
                'middle_name' => ucwords($request->member_middlename),
                'relationship' => ucwords($request->relationship_head),
                'birthdate' => $request->date_of_birth,
                'age' => $request->age,
                'birth_place' => ucwords($request->place_of_birth),
                'sex' => $request->sex,
                'civil_status' => $request->civil_status,
                'educ_attainment' => $request->educ_attainment,
                'occupation' => $request->occupation,
                'philhealth_no' => $request->philihealth_no,
                'exp_date' => $request->expiration_date,
                'fp_method' => $request->fp_method,
                'pregnant' => $request->pregnant,
                'nut_status' => $request->nut_status,
                'height' => $request->height,
                'weight' => $request->weight,
                'fic' => $request->fic,
                'training' => $request->training    
            );
    
            $request->session()->push('member', $data);
            
            echo json_encode($request->session()->get('member'));    
        } else if($option === 'edit') {

            $items = $request->session()->get('member');

            $items[0] = $data;
            $request->session()->put('member', $items);

        }
    }

    public function get(Request $request, $option) {
        $data = array();

        if($option === 'member') {
            if ($request->session()->has('member')) {
                $sessions = $request->session()->get('member');

                // unset($sessions[0]);
                // dd($sessions);
                // return;
                
                foreach ($sessions as $session) {
                    $data[] = array(
                        'id' => $session['id'],
                        'last_name' => $session['last_name'],
                        'first_name' => $session['first_name'],
                        'middle_name' => $session['middle_name'],
                        'relationship' => $session['relationship'],
                        // 'birthdate' => $session['birthdate'],
                        // 'age' => $session['age'],
                        // 'birth_place' => $session['birth_place'],
                        // 'sex' => $session['sex'],
                        // 'civil_status' => $session['civil_status'],
                        // 'educ_attainment' => $session['educ_attainment'],
                        // 'occupation' => $request->occupation,
                        // 'philhealth_no' => $request->philihealth_no,
                        // 'exp_date' => $request->expiration_date,
                        // 'fp_method' => $request->fp_method,
                        // 'pregnant' => $request->pregnant,
                        // 'nut_status' => $request->nut_status,
                        // 'height' => $request->height,
                        // 'weight' => $request->weight,
                        // 'fic' => $request->fic,
                        // 'training' => $request->training    
                    );
                }
            }
            
            return datatables()::of($data)->make(true);
        }
    }

    public function getApi(Request $request) {
        
    }

    public function test() {
        $sanitations = SanitationTypes::all();

        // echo json_encode($sanitations[0]->description);
        return view('pages/household', compact('sanitations'));
    }
}