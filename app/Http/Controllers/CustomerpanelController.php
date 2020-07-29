<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Customer;
use App\Joborder;
use App\Joborderitem;
use App\Jobpicture;
use Hash;


class CustomerpanelController extends Controller
{
    public function index(){
        return view('customerpanel.login');
    }

    public function CusDashboard(){
        if(Session::has('customer')) {
            $jobs = Joborder::where('customer_id',Session('customer')->id)->orderBy('id','desc')->get();
            // dd($jobs);
            return view('customerpanel.index')->with(compact('jobs'));
        }else{
            return abort(404);
        }
    }

    public function fileUpload(Request $request){
        $pic = new Jobpicture();
        $pic->description = $request->description;
        $pic->joborderitem_id = $request->joborderitem_id;

        // request()->validate([
        //     'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        // ]);
        $imageName = time().'.'.request()->path->getClientOriginalExtension();
        request()->path->move(public_path('back/img/joborder'), $imageName);
        $pic->path=$imageName;
        // dd($pic);
        $pic->save();
        return back()->with('success','Image upload successfully!');
    }

    public function OrderDetail($id){
        if(Session::has('customer')) {
            $orderitems = Joborderitem::where('joborder_id',$id)->get();
            foreach($orderitems as $val){
                $images = jobPicture::where('joborderitem_id',$val->id)->get();
            }
            return view('customerpanel.orderitems')->with(compact('orderitems','images'));
        }else{
            return abort(404);
        }
    }

    public function store(Request $request){
        $customer = Customer::where('email',$request->email)->first();
        if($customer==null){
            return redirect('/customer/login')->with('error', 'Invalid Email ! You have entered.');
        }else{
            $pass = Hash::check($request->password,$customer->password);
            if($pass!=true){
                return redirect('/customer/login')->with('error', 'Invalid Password ! You have entered.');
            }else{
                  Session::put('customer',$customer);
                   return redirect('/customer/dashboard');
            }
        }
    }
}
