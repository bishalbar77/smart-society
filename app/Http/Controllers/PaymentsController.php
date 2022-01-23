<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use App\Rent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function rent()
    {
        $page_title = 'Society Credit';
        return view('reports.payrent', compact('page_title'));
    }

    public function accept()
    {
        $page_title = 'Society Debit';
        return view('reports.accept', compact('page_title'));
    }

    public function store(Request $request)
    {  
        $rent = new Rent;
        $rent->name = $request->name;
        $rent->email = $request->email;
        $rent->phone = $request->phone;
        $rent->flat_no = $request->flat_no;
        $rent->txt_dat = $request->txt_dat;
        $rent->type = $request->type;
        $rent->ddl_payment = $request->ddl_payment;
        $rent->txt_ac = $request->txt_ac ? : '';
        $rent->txt_amount = $request->txt_amount ? : '';
        $rent->txt_ref = $request->txt_ref ? : '';
        $rent->remark = $request->remark ? : '';
        $rent->month = $request->month;
        $rent->save();
        return view('home');
    }

    public function index()
    {
        $rent = Rent::all();
        $page_title = 'Credit Receipts';
        return view('reports.datatables', compact('page_title')) -> with('rent', $rent);
    }

    public function debit()
    {
        $rent = Rent::all();
        $page_title = 'Debit Receipts';
        return view('reports.debit', compact('page_title')) -> with('rent', $rent);
    }

    public function audit()
    {
        $rent = Rent::all();
        $page_title = 'Annual Audit';
        return view('reports.audit', compact('page_title')) -> with('rent', $rent);
    }

    public function pdf($id)
    {
        $sale = Rent::find($id);
        $pdf = PDF::loadview('reports.receipt',[
        'sale' => $sale,
    ]);
       return $pdf->download('receipts.pdf');
    }

}
