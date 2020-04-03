<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
    	$users = User::paginate(5);
    	return view('user.index',compact('users'));
    }

    public function create(){
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }


    public function store(Request $request){
        $this->validate($request,[
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'numero_tel' => ['required', 'string', 'max:255'],
            'service' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
  	    ]);
        $user = User::create($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

  	    return redirect(route('user.index'))->with('successMsg','User Successfully Added'); 
    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();

        $action = route('user.update', ['id' => $id]);

        return view('user.edit',compact('user', 'roles','action'));
    }


    public function update(Request $request, $id){
        $user = User::find($id);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->numero_tel = $request->numero_tel;
        $user->service = $request->service;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect(route('user.index'))->with('successMsg','User Successfully Updated');
    }


    public function delete($id){
        User::find($id)->delete();
        return redirect(route('user.index'))->with('successMsg','User Delete Successfully ');
    }

}
