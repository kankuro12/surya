<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spayment;
use App\Supplier;
use App\Supplierbill;
use App\Supplier_payment;

class SupplierPayController extends Controller
{
    //

   public function __construct()
   {
       $this->middleware('auth');
   }
   //
   public function index(){
       $suppliers = Supplier::all();
        return view('back.supplierpay.add')->with(compact('suppliers'));
   }

   public function supplierDue($id){
       $bills = Supplierbill::where('supplier_id',$id)->where('due','>',0)->get();
       return response()->json($bills);
   }

   public function store(Request $request){
      $pay = new Spayment();
      $pay->date = $request->date;
      $pay->amount = $request->amount;
      $pay->payment_type = $request->payment_type;
      $pay->payment_info = $request->payment_info;
      $pay->supplier_id = $request->supplier_id;
      $bills = Supplierbill::where('supplier_id',$request->supplier_id)->get();
        foreach($bills as $bill){
            $bill->ispay = 0;
            $bill->save();
        }
        // dd($bill);
      $supplier = Supplier::where('id',$request->supplier_id)->first();
    //   dd($supplier);
      $due = $supplier->due;
      $supplier->due = $due - $request->amount;
      $supplier->advance = 0;
      $supplier->save();
      $pay->save();
        $paidmaount = $pay->amount;
        foreach (Supplierbill::where('supplier_id',$request->supplier_id)->where('due','>',0)->get() as $key => $value) {
            if($paidmaount<=0){
                break;
            }
            $billpay = new Supplier_payment();
            $billpay->supplierbill_id = $value->id;
            $paid=0;
            if($paidmaount>=$value->due){
                $paid = $value->due;
                $value->due =0;
                $value->save();
            }else{
                $paid = $paidmaount;
                $value->due-=$paid;
                $value->save();
            }
            $billpay->amount = $paid;
            $billpay->payment_type = $request->payment_type;
            $billpay->payment_info = $request->payment_info;
            $billpay->date = $request->date;
            $billpay->save();
            $paidmaount-=$paid;

        }
        return back()->with('success','Payment has been success');
   }

   public function paymentList(){
       $payments = Spayment::orderBy('id','desc')->get();
       return view('back.supplierpay.list')->with(compact('payments'));
   }



}
