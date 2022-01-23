<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Gate;
use DB;
class UsersController extends Controller
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
        $users = User::all();
        $page_title = 'Datatables';
        return view('admin.users.datatables', compact('page_title')) -> with('users', $users);
    }
    
    public function registersociety(Request $request)
    {
        $posts = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();

        $users = new User;
        $users->name = $request->name;
        $users->ltname = $request->ltname;
        $users->dob = $request->dob;
        $users->society_id = $posts->id;
        $users->bgroup = $request->bgroup;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->district = $request->district;
        $users->country = $request->country;
        $users->state = $request->state;
        $users->city = $request->city;
        $users->add = $request->add;
        $users->pincode = $request->pincode;
        $users->password = Hash::make('admin');
        $users->type = 'Society Users';
        $users->save();
        $users->roles()->attach(5);
        $users->save();

        $users = User::all();
        $page_title = 'Society Users';
        return view('admin.users.datatables_sa1', compact('page_title')) -> with([
            'users'=> $users,
            'posts' => $posts,
            ]);

    }

    public function registerstaff(Request $request)
    {
        $posts = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();

        $users = new User;
        $users->name = $request->name;
        $users->ltname = $request->ltname;
        $users->dob = $request->dob;
        $users->society_id = $posts->id;
        $users->bgroup = $request->bgroup;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->department = $request->department;
        $users->is_active = '0';
        $users->district = $request->district;
        $users->country = "IN";
        $users->state = $request->state;
        $users->city = $request->city;
        $users->add = $request->add;
        $users->pincode = $request->pincode;
        $users->password = Hash::make('admin');
        $users->type = 'Society Staffs';
        $users->save();
        $users->roles()->attach(5);
        $users->save();

        $users = User::all();
        $page_title = 'Society Users';
        return view('admin.users.datatables_sa2', compact('page_title')) -> with([
            'users'=> $users,
            'posts' => $posts,
            ]);

    }

    public function society()
    {
        $users = User::all();
        $page_title = 'Society Presidents';
        return view('admin.users.datatables_sa', compact('page_title')) -> with('users', $users);
    }

    public function societyusers()
    {
        $posts = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();

        $users = User::all();
        $page_title = 'Society Access Users';
        return view('admin.users.datatables_sa1', compact('page_title')) -> with([
            'users'=> $users,
            'posts' => $posts,
            ]);
    }

    public function societystaff()
    {
        $posts = DB::table('posts')
        ->where('id', '=',Auth::user()->society_id)
        ->first();

        $users = User::all();
        $page_title = 'Society Staffs';
        return view('admin.users.datatables_sa2', compact('page_title')) -> with([
            'users'=> $users,
            'posts' => $posts,
            ]);
    }

    public function ajax()
    {
        $users = User::all();
        $page_title = 'User Datatables';
        return view('admin.users.datatables2', compact('page_title')) -> with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function managercreate()
    {
        $roles = Role::all();
        $page_title = 'Society Manager Registration';
        return view('admin.users.create', compact('page_title'))->with([
            'roles' => $roles,
        ]);
    }

    public function staffcreate()
    {
        $roles = Role::all();
        $page_title = 'Staff Registration';
        return view('admin.users.staff', compact('page_title'))->with([
            'roles' => $roles,
        ]);
    }

    public function ownercreate()
    {
        $roles = Role::all();
        $page_title = 'Owner Registration';
        return view('admin.owner.create', compact('page_title'))->with([
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.users.show')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->ltname = $request->ltname;
        $user->bgroup = $request->bgroup;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->district = $request->district;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->pincode = $request->pincode;
        $user->add = $request->add;
        
        $user->save();
        return redirect('/admin/society/users')->with('successed', 'User have been updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect() -> route('admin.users.index');
    }

    public function changestatus($id)
    {
        $user = User::find($id);
        $user->is_active=!$user->is_active;
        
        if($user->save())
        {
  
            return redirect()->back();
        }
        else {
           
            return redirect(route('admin.users.changestatus'));
            
        }
    }
}
