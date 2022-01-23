<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use DB;
use Carbon\Carbon;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::all();
        $page_title = 'Datatables';
        return view('Visitors.datatables', compact('page_title'))->with([
            'visitors' => $visitors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storevisitor(Request $request)
    {
        $visitor = new Visitor;
        $visitor->name = $request->name;
        $visitor->getpass = "PASS" . rand(100,9999);
        $visitor->email = $request->email;
        $visitor->purpose = $request->purpose;
        $visitor->vehicle_no = $request->vehicle_no;
        $visitor->flat_no = $request->flat_no;
        $visitor->phone = $request->phone;
        $visitor->in_time = Carbon::now();
        $visitor->save();
        $visitors = Visitor::all();
        $page_title = 'Datatables';
        return view('Visitors.datatables', compact('page_title'))->with([
            'visitors' => $visitors,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inservice = DB::table('visitors')
            ->where('id', '=', $id)
            ->update(['out_time' => Carbon::now()]);
        $visitors = Visitor::all();
        $page_title = 'Datatables';
        return view('Visitors.datatables', compact('page_title'))->with([
            'visitors' => $visitors,
        ]);
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
        Visitor::where('id',$id)->delete();
        $visitors = Visitor::all();
        $page_title = 'Datatables';
        return view('Visitors.datatables', compact('page_title'))->with([
            'visitors' => $visitors,
        ]);
    }
}
