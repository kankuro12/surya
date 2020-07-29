<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Salary;

class SalaryController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('back.salary.add')->with(compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $salaries = Salary::orderBy('id','desc')->get();
        return view('back.salary.list')->with(compact('salaries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $salary = new Salary();
       $salary->amount = $request->amount;
       $salary->issued_date = $request->issued_date;
       $salary->issued_till = $request->issued_till;
       $salary->issued_by = $request->issued_by;
       $salary->staff_id = $request->staff_id;
       $salary->date = $request->date;

       $staff = Staff::where('id',$request->staff_id)->first();
       if($staff->advance >= $staff->salary){
         $advance = $staff->advance;
         $staff->advance = $advance - $staff->salary;
         $staff->save();
       }else{
           $staff->advance = 0;
           $staff->save();
       }
       $salary->save();
       return back()->with('success','Salary Added Successfully !');

    //    dd($salary);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
