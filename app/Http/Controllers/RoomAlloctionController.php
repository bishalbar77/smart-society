<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomAlloction;
use DB;
use Illuminate\Support\Facades\Auth;

class RoomAlloctionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pages.member');  
    }

    public function show()
    {   
        $FetchPostID = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();
        $offers = RoomAlloction::all();
        $page_title = 'Packages';
        return view('pages.packagesdatatable', compact('page_title')) -> with([
            'offers' => $offers,
            'FetchPostID'=> $FetchPostID,
            ]);
    }

    public function offer_data(Request $request)
    {
        $FetchPostID = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();
        $offer = new RoomAlloction();
        $offer->society_id = $FetchPostID->id;
        $offer->pck_id = $request->input('pk_id');
        $offer->block = $request->input('block');
        $offer->floor = $request->input('floor');
        $offer->of_type = $request->input('off_type');
        $offer->amount = $request->input('pk_amount');
        $offer->no_of_jobs = $request->input('pk_job');
        $offer->no_of_ivnt = $request->input('pk_inventory');
        $offer->no_of_agent = $request->input('pk_agent');
        $offer->save();
        return redirect(url('/memberpack'));
    }
}
