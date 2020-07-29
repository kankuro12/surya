<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use App\Salary;
use App\Expense;
use App\Joborder;
use App\Supplierbill;
use App\Staff;
use App\Customer;
use App\Supplier;
use App\Advance;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // total salary
        $salary = Salary::all()->sum('amount');
        $totaladv = Advance::all()->sum('amount');

        // total expenses
        $exp = Expense::all()->sum('amount');

        // total joborder
        $order = Joborder::all();
        $due = $order->sum('due');
        $totalorder = $due + $order->sum('advance');

        // total supplier bills
        $bill = Supplierbill::where('iscancel','!=', 1)->get();
        $vat = $bill->sum('vat');
        $discount = $bill->sum('discount');
        $totalbill = ($bill->sum('total_amount') + $vat) - $discount;

        // total staff member
        $staff = Staff::count();
        // totla customer
        $customer = Customer::count();
        // total supplier
        $supplier = Supplier::count();



        return view('back.index')->with(compact('salary','exp','totalorder','totalbill','staff','customer','supplier','totaladv'));
    }

}
