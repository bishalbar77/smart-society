<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:13', 'unique:users'],
            'dob' => ['required', 'string', 'max:255'],
            'ltname' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'string', 'max:255'],
            'add' => ['required', 'string', 'max:255'],
            'type' => '',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'district' => $data['district'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'pincode' => $data['pincode'],
            'add' => $data['add'],
            'type' => $data['type'] ? : '',
            'ltname' => $data['ltname'],
            'password' => Hash::make('admin'),
        ]);
        $role = $data['roles'];
        $user->roles()->attach($role);
        return $user;
    }

    public function register(Request $request)
    {
        
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $user->roles()->sync($request->roles);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath('/'));
    }
}
