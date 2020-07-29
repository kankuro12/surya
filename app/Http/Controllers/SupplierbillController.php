<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Supplierbill;
use App\Supplierbillitem;

class SupplierbillController extends Controller
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


    public function index(){
        $suppliers = Supplier::all();
        return view('back.supplierbill.add')->with(compact('suppliers'));
    }

    public function list(){
        $bills = Supplierbill::orderBy('id','desc')->where('iscancel','!=',1)->get();
        return view('back.supplierbill.list')->with(compact('bills'));
    }

    public function billItems($id){
        $billitems = Supplierbillitem::where('supplierbill_id',$id)->get();
        return view('back.supplierbill.billitem')->with(compact('billitems'));
    }

    public function store(Request $request){
        $data = $request->all();

        $bill = new Supplierbill();
        $bill->supplier_id = $request->supplier_id;
        $bill->date = $request->date;
        $bill->total_amount = $request->total_amount;
        $bill->vat = $request->vat;
        $bill->due = $request->due;
        $bill->discount = $request->discount;
        $bill->save();

         $counters=explode(",",$request->counter);


         foreach ($counters as $key => $value) {

          $billitem = new Supplierbillitem();
          $billitem->particular = $data['ptr_'.$value];
          $billitem->rate = $data['rate_'.$value];
          $billitem->qty = $data['qty_'.$value];
          $billitem->total = $data['total_'.$value];
          $billitem->supplierbill_id = $bill->id;
          $billitem->save();
         }
         $supplier = Supplier::where('id',$request->supplier_id)->first();
         $due = $supplier->due;
         $supplier->due = $due + $request->due;
         $supplier->save();
         return back()->with('success','Successfully bill added');
    }

    public function billUpdate(Request $request,$id){
        $data = $request->all();
        $bill = Supplierbill::where('id',$id)->first();
        $bill->supplier_id = $request->supplier_id;
        $bill->date = $request->date;
        $bill->total_amount = $request->total_amount;
        $bill->vat = $request->vat;

        $bill->discount = $request->discount;

        if($request->counter!=null){

            $counters=explode(",",$request->counter);

            foreach ($counters as $key => $value) {

               $billitem = new Supplierbillitem();
               $billitem->particular = $data['ptr_'.$value];
               $billitem->rate = $data['rate_'.$value];
               $billitem->qty = $data['qty_'.$value];
               $billitem->total = $data['total_'.$value];
               $billitem->supplierbill_id = $bill->id;
               $billitem->save();
              }
        }
           $supplier = Supplier::where('id',$request->supplier_id)->first();

               $due = $supplier->due - $bill->due;
               $supplier->due = $due + $request->due;
            //  dd($request->due);
               $supplier->save();
               $bill->due = $request->due;
           $bill->save();
           return back()->with('success','Successfully bill Updated');
    }

    public function billEdit($id){
        $suppliers = Supplier::all();
        $bill = Supplierbill::where('id',$id)->first();
        // dd($bill);
        $billitems = Supplierbillitem::where('supplierbill_id',$bill->id)->get();
        return view('back.supplierbill.edit')->with(compact('suppliers','bill','billitems'));
    }

    public function billCancel($id){
        $bill = Supplierbill::where('id',$id)->first();
        $bill->iscancel = 1;
        // dd($bill->due);
        $supplier = Supplier::where('id',$bill->supplier_id)->first();
        // dd($supplier);
        $due = $supplier->due;
        $supplier->due = $due - $bill->due;
        $supplier->save();
        $bill->save();
        return back()->with('warning','Successfully Your bill removed from list');
    }

    public function billUndo($id){
        $bill = Supplierbill::where('id',$id)->first();
        $bill->iscancel = 0;
        $supplier = Supplier::where('id',$bill->supplier_id)->first();
        // dd($supplier);
        $due = $supplier->due;
        $supplier->due = $due + $bill->due;
        $supplier->save();
        $bill->save();
        return back()->with('success','Successfully Your bill added into list');
    }

    public function billCancelList(){
        $bills = Supplierbill::orderBy('id','desc')->where('iscancel','!=',0)->get();
        return view('back.supplierbill.cancelbill')->with(compact('bills'));
    }

    public function billItemDel($id){
        $billitem = Supplierbillitem::where('id',$id)->first();
        $bill = Supplierbill::where('id',$billitem->supplierbill_id)->first();
            $bill->total_amount = $bill->total_amount - $billitem->total;
            $bill->save();
            $billitem->delete();
       return back()->with('warning','Successfully Your billitem deleted from database');
    }
}
