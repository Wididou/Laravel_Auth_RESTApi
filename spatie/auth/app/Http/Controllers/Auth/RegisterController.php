<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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
    protected $redirectTo ;
    //= RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check()  //if it is authenticated
        && Auth::user()->role->id==1  //if its the admin
        ){
            $this->redirectTo = route('admin.dashbord');
        } elseif(Auth::check()  //if it is authenticated & QHSE role
        && Auth::user()->role->id==5){
            $this->redirectTo = route('qhse.dashbord');
        }        
        else{ 
            $this->redirectTo = route('qhse.dashbord');
        }

        $this->middleware('guest');    
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
         //   'role_id' => ['required', 'integer'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'numero_tel' => ['required', 'string', 'max:255'],
            'service' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'role_id' => 5,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'numero_tel' => $data['numero_tel'],
            'service' => $data['service'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
