<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joborder;
use App\Customer;
use App\Joborderitem;
class foo{

}

class ApiController extends Controller
{
    public function billingApi($id){
        $message=[];
        $message['error']=true;
        $message['data']="";
        $message['next']=$id;
        $message['prev']=$id;
        $message['hasnext']=false;
        $message['hasprev']=false;
        $billing = Joborder::where('id',$id)->first();
        if($billing==null){
            $greatcount = Joborder::where('id','>',$id)->count();
            $lesscount = Joborder::where('id','<',$id)->count();

            if($greatcount>0){
                $billing=Joborder::where('id','>',$id)->first();
                $message['next']=$billing->id;
                $hessage['hasnext']=true;
            }else{
                if($lesscount>0){
                    $billing=Joborder::where('id','<',$id)->orderBy('id','DESC')->first();
                    $message['prev']=$billing->id;
                    $hessage['hasprev']=true;
                }
            }

        }else{

            $message['error']=false;
            $billing->billitems = Joborderitem::where('joborder_id',$billing->id)->get();
            $message['data']=$billing;
        }

        // return Response::json($billing);
        return response()->json($message);
    }


    public function billsApi($id){
        $message=new foo();
        $message->bills=[];
        
        $billings = Joborder::where('id',">",$id)->get();
        foreach ($billings as $key => $value) {
            $value->billitems=Joborderitem::where('joborder_id',$value->id)->get();
            $value->customer=Customer::where('id',$value->customer_id)->first();
            array_push($message->bills,$value);
        }
        return response()->json($message);

    }
}
