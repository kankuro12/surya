<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joborder;
use App\Customer;
use App\Joborderitem;
use Illuminate\Support\Facades\Hash;
use App\Events\JoborderAdded;

class JoborderController extends Controller
{


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
        $jobs = Joborder::where('status', '!=', 4)->get();
        return view('back.job.list')->with(compact('jobs'));
    }




    public function list()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        // dd($customers);
        return view('back.job.add')->with(compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);


        $customer = new Customer();
        if ($request->c_id == null) {

            $customer->name = $request->c_name;
            $customer->address = $request->c_address;
            $customer->phone = $request->c_phone;
            $customer->email = $request->c_email;
            $customer->password = Hash::make("admin");
            $customer->due = 0;
            $customer->save();
        } else {
            $customer = Customer::find($request->c_id);
        }

        $joborder = new Joborder();
        $joborder->s_n = 0;
        $joborder->date = date("y/M/d H m");
        $joborder->order_received_date = $request->order_received_date;
        $joborder->order_delever_date = $request->order_delever_date;
        $joborder->grand_total = $request->grand_total;
        $joborder->advance = $request->advance > $request->grand_total ? $request->grand_total : $request->advance;
        $joborder->due = $request->due;
        $joborder->customer_id = $customer->id;
        $joborder->status = 0;

        $joborder->save();

        $counters = explode(",", $request->counter);

        // "item_particular_0" => "asdfasdf"
        // "item_height_0" => "0"
        // "item_width_0" => "0"
        // "item_qty_0" => "0"
        // "item_size_0" => "0"
        // "item_total_0" => "12345"
        // "item_remarks_0" => null

        // protected $fillable=[
        //     'particular',
        //     'length',
        //     'height',
        //     'rate',
        //     'qty',
        //     'total',
        //     'status',
        //     'type',
        //     'joborder_id',
        //   ];

        // dd($counters);

        foreach ($counters as $key => $value) {

            $joborderitem = new Joborderitem();
            $joborderitem->length = (float) $data['item_width_' . $value];
            $joborderitem->height = (float)$data['item_height_' . $value];
            $joborderitem->particular = $data['item_particular_' . $value];
            $joborderitem->rate = (int)$data['item_rate_' . $value];
            $joborderitem->qty = (int)$data['item_qty_' . $value];
            $joborderitem->type = (int)$data['item_type_' . $value];
            $joborderitem->total = (float)$data['item_total_' . $value];
            $joborderitem->joborder_id = (int)$joborder->id;
            $joborderitem->remark = $data['item_remarks_' . $value] ?? "";
            $joborderitem->status = 0;
            // dd($joborderitem);
            $joborderitem->save();
        }

        $due = $customer->due;
        $customer->due = $due + $joborder->due;
        $customer->save();

        event(new JoborderAdded($joborder->id));
        return back()->with('success', 'Successfully ! Job order created.');
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
        //
    }

    public function worker(Request $request)
    {


        return view('worker.worker');
    }
}
