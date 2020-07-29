<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Advance;


class StaffController extends Controller
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
        return view('back.staff.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $staffs = Staff::all();
        // foreach ($staffs as $staff) {
        //     $advance = $staff->advances;
        //     dd($advance);
        // }
        return view('back.staff.list')->with(compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = new Staff();
        $staff->name = $request->name;
        $staff->address = $request->address;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->salary = $request->salary;
        $staff->start_date = $request->start_date;
        $staff->nationality = $request->nationality;
        $staff->nationality_no = $request->nationality_no;
        $staff->parent_name = $request->parent_name;
        $staff->type = $request->type;

        // $request->image->store('back/img/staff');
        // $path = $request->image->hashName();
        // $staff->image = $path;
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('back/img/staff'), $imageName);
            $staff->image=$imageName;
            $staff->save();
        if($staff->save()==true){
            return back()->with('success','Staff added successfully!');
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
        $staff = Staff::find($id);
        return view('back.staff.edit')->with(compact('staff'));
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
        $staff = Staff::find($id);
        $staff->name = $request->name;
        $staff->address = $request->address;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->salary = $request->salary;
        $staff->start_date = $request->start_date;
        $staff->nationality = $request->nationality;
        $staff->nationality_no = $request->nationality_no;
        $staff->parent_name = $request->parent_name;
        $staff->type = $request->type;


            if(request()->hasFile('image')){
                request()->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                // dd($request->image);
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('back/img/staff'), $imageName);
                $staff->image=$imageName;
            }else{
                // dd($request->oldimg);
                $staff->image = $request->oldimg;
            }
            $staff->save();

        if($staff->save()==true){
            return back()->with('success','Staff added successfully!');
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
        $staff = Staff::find($id);
        $staff->delete();
        return back()->with('warning','Staff deleted successfully!');
    }
}
