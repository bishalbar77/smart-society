<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use DB;
use App\User;
use App\Owner;
use App\RoomAlloction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class OwnerController extends Controller
{

    public function index()
    {
        $FetchPostID = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();
        $users = Owner::all();
        $page_title = 'Datatables';
        return view('admin.owner.datatables', compact('page_title')) -> with([
            'users' => $users,
            'FetchPostID' => $FetchPostID,
            ]);
    }

    public function addowner()
    {
        $FetchPostID = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();
        $offers= RoomAlloction::all();
        $roles = Role::all();
        $page_title = 'Owner Registration';
        return view('admin.owner.create', compact('page_title'))->with([
            'roles' => $roles,
            'offers' => $offers,
            'FetchPostID' => $FetchPostID,
        ]);
    }

    public function addtenant()
    {
        $roles = Role::all();
        $user = Owner::all();
        $page_title = 'Tenant Registration';
        return view('admin.tenant.create', compact('page_title'))->with([
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {  
        $FetchPostID = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();
        $users = new Owner;
        $users->name = $request->name;
        $users->ltname = $request->ltname;
        $users->society_id = $FetchPostID->id;
        $users->dob = $request->dob;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->district = $request->district;
        $users->country = $request->country;
        $users->state = $request->state;
        $users->city = $request->city;
        $users->add = $request->add;
        $users->ownership = 'Owner';
        $users->flat_no = $request->flat_no;
        $users->pincode = $request->pincode;
        $users->aadhar = $request->aadhar;
        $users->pan = $request->pan;
        $users->citizen_type = $request->citizen_type;
        $users->m_option_1 = $request->m_option_1;
        $users->save();
        return redirect(url('/residents'));
    }

    public function storetenant(Request $request)
    {  
        $FetchPostID = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();
        $users = new Owner;
        $users->name = $request->name;
        $users->ltname = $request->ltname;
        $users->society_id = $FetchPostID->id;
        $users->dob = $request->dob;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->district = $request->district;
        $users->country = $request->country;
        $users->state = $request->state;
        $users->city = $request->city;
        $users->add = $request->add;
        $users->ownership = 'Tenant';
        $users->flat_no = $request->flat_no;
        $users->pincode = $request->pincode;
        $users->aadhar = $request->aadhar;
        $users->pan = $request->pan;
        $users->citizen_type = $request->citizen_type;
        $users->m_option_1 = "N/A";
        $users->save();
        return redirect(url('/residents'));
    }

    public function changestatus($id)
    {
        $user = Owner::find($id);
        $user->is_active=!$user->is_active;
        
        if($user->save())
        {
  
            return redirect()->back();
        }
        else {
           
            return redirect(route('owner.users.changestatus'));
            
        }
    }

}
