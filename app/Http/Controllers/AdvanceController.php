<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advance;
use App\Staff;

class AdvanceController extends Controller
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
        $staff = Staff::all();
        return view('back.advance.add')->with(compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advances = Advance::all();
        foreach ($advances as $advance) {
            // dd($advance->staff_id);
            // $staffs = $advance->staffs;
            // dd($staffs);
            $staff = Staff::find($advance->staff_id);
            $advance->staff_name = $staff->name;
        }
        // dd($advances);
        return view('back.advance.list')->with(compact('advances'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adv = new Advance();
        $adv->amount = $request->amount;
        $adv->date = $request->date;
        $adv->issued_by = $request->issued_by;
        $adv->staff_id = $request->staff_id;
        $adv->save();
        $staff = Staff::where('id',$request->staff_id)->first();
        $advance = $staff->advance;
        $advance = $advance + $request->amount;
        $staff->advance =  $advance;
        $staff->save();
        if($adv->save()==true){
            return back()->with('success','Advance added successfully!');
        }else{
            return back()->with('error','Woops something is wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::all();
        $sadv = Advance::find($id);
        return view('back.advance.edit')->with(compact('staff','sadv'));
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
        $adv = Advance::find($id);
        $adv->date = $request->date;
        $adv->issued_by = $request->issued_by;
        $adv->staff_id = $request->staff_id;

        $staff = Staff::where('id',$adv->staff_id)->first();
        $sub = $staff->advance - $adv->amount;
        $sub = $sub + $request->amount;
        $staff->advance = $sub;
        $adv->amount = $request->amount;
        $adv->save();
        $staff->save();
        if($adv->save()==true){
            return back()->with('success','Advance updated successfully!');
        }else{
            return back()->with('error','Woops something is wrong!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adv = Advance::find($id);
        $adv->delete();
        $staff = Staff::where('id',$adv->staff_id)->first();
        if($staff->advance>0){
            $advance = $staff->advance;
            $advance = $advance - $adv->amount;
            $staff->advance =  $advance;
            $staff->save();
        }else{
            $staff->advance = 0;
            $staff->save();
        }
        return back()->with('warning','Advance deleted successfully!');
    }
}
