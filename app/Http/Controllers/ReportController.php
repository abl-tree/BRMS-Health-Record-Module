<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ufc;
use App\mch;
use App\pp;
use App\cdd;
use App\cari;
use App\gms;
use App\fp;
use App\Person;
use App\epi;
class ReportController extends Controller
{
    protected $db_connection;

//Syempre par kailangan mo maging wise , pag ayaw sayo edi putangina sakalin mo tutal demonyo ka naman e.
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->db_connection = config('database.default');
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/report');
    }

   /* public function refresh()
    {
       //$user = User::all();
       $ultimatesickquery= DB::table('deliveries')
            ->join('persons', 'persons.id', '=', 'deliveries.mch_id')

            ->select('deliveries.id','deliveries.age','deliveries.g','deliveries.p','deliveries.rcode','deliveries.level','deliveries.range','deliveries.lmp','deliveries.edc','deliveries.remarks', 'persons.firstName','persons.midName','persons.lastName')
            ->get();
       return \DataTables::of($ultimatesickquery)

       ->make(true);
    }
    */
    public function refresh1()
    {
       //$user = User::all();
       $ultimatesickquery= DB::table('pp_report')
            ->join('persons', 'persons.id', '=', 'pp_report.pp_id')

            ->select('pp_report.id','pp_report.age','pp_report.PlaceofDelivery','pp_report.attended_by','pp_report.gender','pp_report.fdg','pp_report.weight','pp_report.date_of_pp','pp_report.vitamina','pp_report.dod', 'pp_report.F','persons.firstName','persons.midName','persons.lastName')
            ->get();
       return \DataTables::of($ultimatesickquery)

       ->make(true);
    }
    public function refresh2()
    {
       //$user = User::all();
       $ultimatesickquery= DB::table('epi_report')
            ->join('persons', 'persons.id', '=', 'epi_report.epi_id')

            ->select('epi_report.id','epi_report.age','epi_report.mother_name','epi_report.father_name','epi_report.fdg','epi_report.weight','epi_report.r_code','epi_report.vaccine','persons.firstName','persons.midName','persons.lastName','persons.dob')
            ->get();
       return \DataTables::of($ultimatesickquery)

       ->make(true);
    }
    public function refresh3()
    {
       //$user = User::all();
       $ultimatesickquery= DB::table('ufc_report')
            ->join('persons', 'persons.id', '=', 'ufc_report.ufc_id')

            ->select('ufc_report.id','ufc_report.age','ufc_report.mother_name','ufc_report.father_name','ufc_report.fdg','ufc_report.weight','ufc_report.r_code','ufc_report.remarks','persons.firstName','persons.midName','persons.lastName','persons.dob')
            ->get();
       return \DataTables::of($ultimatesickquery)

       ->make(true);
    }
    public function refresh4()
    {
       //$user = User::all();
       $ultimatesickquery= DB::table('fp_report')
            ->join('persons', 'persons.id', '=', 'fp_report.fp_id')

            ->select('fp_report.id','fp_report.age','fp_report.num_child','fp_report.lmp','fp_report.client_type','fp_report.method_accepted','fp_report.remarks','persons.firstName','persons.midName','persons.lastName')
            ->get();
       return \DataTables::of($ultimatesickquery)

       ->make(true);
    }

    public function refresh5()
    {
       //$user = User::all();
       $ultimatesickquery= DB::table('cdd_report')
            ->join('persons', 'persons.id', '=', 'cdd_report.cdd_id')

            ->select('cdd_report.id','cdd_report.age','cdd_report.complaints','cdd_report.num_OR','cdd_report.remarks','persons.firstName','persons.midName','persons.lastName')
            ->get();
       return \DataTables::of($ultimatesickquery)

       ->make(true);
    }
    public function refresh6()
    {
       //$user = User::all();
       $ultimatesickquery= DB::table('cari_report')
            ->join('persons', 'persons.id', '=', 'cari_report.cari_id')

            ->select('cari_report.id','cari_report.age','cari_report.complaints','cari_report.HO_advice','persons.firstName','persons.midName','persons.lastName')
            ->get();
       return \DataTables::of($ultimatesickquery)

       ->make(true);
    }
    public function refresh7()
    {
       //$user = User::all();
       $ultimatesickquery= DB::table('gms_report')
            ->join('persons', 'persons.id', '=', 'gms_report.gms_id')

            ->select('gms_report.id','gms_report.age','gms_report.complaints','gms_report.HO_advice','persons.firstName','persons.midName','persons.lastName')
            ->get();
       return \DataTables::of($ultimatesickquery)

       ->make(true);
    }



    public function quarterlyView()
    {
        return view('pages/quarterly');
    }
}
