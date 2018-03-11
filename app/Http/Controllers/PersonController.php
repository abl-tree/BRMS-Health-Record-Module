<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
class PersonController extends Controller
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
        return view('pages/household');
    }
	
	/*public function store(Request $request)
    {

        $expense = new Expense;
        $expense->description = $request->expense;
        $expense->type = $request->type;
        $expense->amount = '₱' . number_format($request->amount, 2, '.', ',');
        $expense->save();
    }*/

    public function refresh()
    {
        $person = Person::all();
        return \DataTables::of(Person::query())->make(true);
 
    }
}
