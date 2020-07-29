<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Customer_payment;
use App\Joborder;
use App\Payment;


class CustomerPayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // customer payments controller
    public function index(){
       $customers = Customer::all();
        return view('back.customerpay.add')->with(compact('customers'));
    }

    public function store(Request $request){
        $pay = new Payment();
        $pay->date = $request->date;
        $pay->amount = $request->amount;
        $pay->payment_type = $request->payment_type;
        $pay->payment_info = $request->payment_info;
        $pay->customer_id = $request->customer_id;
        // customer_id chainw

        $customer = Customer::where('id', $request->customer_id)->first();
          $due = $customer->due;
          $customer->due = $due - $pay->amount;
          $customer->save();
          $pay->save();
            $paidamount=$pay->amount;
          foreach (Joborder::where('customer_id', $request->customer_id)->where('due','>',0)->get() as $key => $value){
            if($paidamount<=0){
                break;
            }
            $joborderpay=new Customer_payment();
            $joborderpay->joborder_id=$value->id;
            $paid=0;
            if($paidamount>=$value->due){
                $paid=$value->due;
                $value->due=0;
                $value->save();
            }else{
                $paid=$paidamount;
                $value->due-=$paid;
                $value->save();
            }
            $joborderpay->amount = $paid;
            $joborderpay->date = $request->date;
            $joborderpay->payment_type = $request->payment_type;
            $joborderpay->payment_info = $request->payment_info;
            $joborderpay->save();
            $paidamount-=$paid;
          }
          return back()->with('success','Payment has been success');
    }

    public function duebills($id){
        $bills = Joborder::where('customer_id', $id)->where('due','>',0)->get();
        return response()->json($bills);
    }

}
