<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expcategory;
use App\Expense;
class ExpenseController extends Controller
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
        return view('back.expense.add');
    }

    public function list()
    {
        $expenses = Expcategory::orderBy('id','desc')->get();
        return view('back.expense.list')->with(compact('expenses'));
    }


    public function manage($id)
    {
        $expense = Expcategory::find($id);
        return view('back.expense.manage')->with(compact('expense'));
    }

    public function expenses($id)
    {
        $expenses= Expense::where('expcategory_id',$id)->orderBy('id','desc')->get();
        return view('back.expense.explist')->with(compact('expenses'));
    }

    public function editExp($id)
    {
        $exp = Expense::find($id);
        return view('back.expense.expedit')->with(compact('exp'));
    }

    public function editExpStore(Request $request, $id)
    {
        $exp = Expense::find($id);
        $exp->name = $request->name;
        $exp->date = $request->date;
        $exp->amount = $request->amount;
        $exp->expcategory_id = $request->expcategory_id;
        $exp->save();
        if( $exp->save()==true){
            return redirect('/expenses/'.$exp->expcategory_id)->with('success','Expense edited successfully!');
            // return back()->with('success','Expense edited successfully!');
        }else{
            return back()->with('error','Woops something is worng!');
        }

    }

    public function manageStore(Request $request)
    {
       $exp = new Expense();
       $exp->name = $request->name;
       $exp->date = $request->date;
       $exp->amount = $request->amount;
       $exp->expcategory_id = $request->expcategory_id;
       $exp->save();
       if( $exp->save()==true){
           return back()->with('success','Expense added successfully!');
       }else{
           return back()->with('error','Woops something is worng!');
       }
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
        $exp = new Expcategory();
        $exp->name = $request->name;
        $exp->save();
        if( $exp->save()==true){
            return back()->with('success','Expense added successfully!');
        }else{
            return back()->with('error','Woops something is occured!');
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
        $exp = Expcategory::find($id);
        $exp->delete();
        return back()->with('warning','Expenses category deleted successfully!');
    }


    public function destroyExp($id)
    {
        $exp = Expense::find($id);
        $exp->delete();
        return back()->with('warning','Expense deleted successfully!');
    }
}
