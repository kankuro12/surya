<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Joborder;
use App\Joborderitem;
use App\Jobpicture;
use App\Design;
use Hash;
use File;

class CustomerController extends Controller
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
        return view('back.customer.add');
    }

    public function list()
    {
        $customers = Customer::all();
        return view('back.customer.list')->with(compact('customers'));
    }

    public function jobDetail($id)
    {
        $jobs = Joborder::where('customer_id',$id)->orderBy('id','desc')->get();
        $customer = Customer::where('id',$id)->first();
        // dd($jobs);
        return view('back.customer.order')->with(compact('jobs','customer'));
    }

    public function jobOrderitem($id)
    {
        $orderitems = Joborderitem::where('joborder_id',$id)->get();
        foreach($orderitems as $val){
            $images = jobPicture::where('joborderitem_id',$val->id)->get();
            $files = Design::where('joborderitem_id',$val->id)->get();
        }
        return view('back.customer.orderitem')->with(compact('orderitems','images','files'));
    }

    public function jobPicture(Request $request){
        $pic = new Jobpicture();
        $pic->description = $request->description;
        $pic->joborderitem_id = $request->joborderitem_id;

        request()->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->path->getClientOriginalExtension();
        request()->path->move(public_path('back/img/joborder'), $imageName);
        $pic->path=$imageName;
        // dd($pic);
        $pic->save();
        return back()->with('success','Image upload successfully!');
    }

    // file upload by Designer

    public function jobDesign(Request $request){
        $images = $request->file('path');
        foreach($images as $image)
        {
            $dsn = new Design();
            $dsn->description = $request->description;
            $dsn->joborderitem_id = $request->joborderitem_id;
            $name =  $dsn->joborderitem_id."-".$image->getClientOriginalName();
            $image->move(public_path('back/img/design'), $name);
            $dsn->path = $name;
            $dsn->save();
        }
        $joborderitems = Joborderitem::where('id', $request->joborderitem_id)->first();
        $joborderitems->status = 1;
        $joborderitems->save();

        return back()->with('success','Image upload successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->due = $request->due;
        // $customer->advance = $request->advance;
        $customer->password =Hash::make("admin");
        $customer->save();
       if($customer->save()==true){
          return back()->with('success','Data added successfully!');
           // print_r($customer);
       }else{
          return back()->with('error','Woops, Something is worng!');
       }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('back.customer.edit')->with(compact('customer'));
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
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->due = $request->due;
        // $customer->advance = $request->advance;
        $customer->password =bcrypt("admin");
        $customer->save();
        if($customer->save()==true){
            return back()->with('success','Data update successfully!');
             // print_r($customer);
         }else{
            return back()->with('error','Woops, Something is worng!');
         }
    }

    // public function designDownload($id){
    //     $design = Design::find($id);
    // }

    public function imageDownload($id){
        $image = Jobpicture::find($id);
        $file= public_path(). "/back/img/joborder/".$image->path;
        return response()->download($file);
    }

    public function imageDelete($id){
        $image = Jobpicture::find($id);
        $image->delete();
        return back()->with('success','Image delete successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return back()->with('warning','Data delete successfully!');
    }
}
