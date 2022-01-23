<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountSetup;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade as PDF;
use Gate;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class AccountSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('account_setups')
        ->where('user_id', '=', Auth::user()->id)
        ->first();
        // dd($posts);
        return view('pages.account')->with(['posts' => $posts ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = DB::table('account_setups')
        ->where('user_id', '=', Auth::user()->id)
        ->first();
        if(isset($posts))
        {
            $posts = AccountSetup::find($posts->id);
            $posts->users = $request->users;
            $posts->data = $request->data;
            $posts->subdomain = $request->subdomain;
            $posts->company = $request->company;
            $posts->lang = $request->lang;
            $posts->time = $request->time;
            $posts->save();

            return redirect(route('home'));
        }
        else
        {
            $posts = new AccountSetup();
            $posts->user_id = Auth::user()->id;
            $posts->users = $request->users;
            $posts->data = $request->data;
            $posts->subdomain = $request->subdomain;
            $posts->company = $request->company;
            $posts->lang = $request->lang;
            $posts->time = $request->time;
            $posts->save();

            return redirect(route('home'));
        }

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
}
