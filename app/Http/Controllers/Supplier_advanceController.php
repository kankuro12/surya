<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier_advance;
use App\Supplier;

class Supplier_advanceController extends Controller
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
        $suppliers = Supplier::all();
        return view('back.suppadvance.add')->with(compact('suppliers'));
    }

    public function list()
    {
        $suppliers = Supplier_advance::orderBy('id','desc')->get();
        return view('back.suppadvance.list')->with(compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adv = new Supplier_advance();
        $adv->amount = $request->amount;
        $adv->date = $request->date;
        $adv->issued_by = $request->issued_by;
        $adv->supplier_id = $request->supplier_id;
        $adv->save();
        $supp = Supplier::where('id',$request->supplier_id)->first();
        $total = $supp->advance + $adv->amount;
        $supp->advance = $total;
        $supp->save();
        return back()->with('success','Advance added successfully!');
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
        $adv = Supplier_advance::find($id);
        $adv->delete();
        $supp = Supplier::where('id', $adv->supplier_id)->first();
        $total = $supp->advance - $adv->amount;
        $supp->advance = $total;
        $supp->save();
        return back()->with('warning','Advance deleted successfully!');

    }
}
