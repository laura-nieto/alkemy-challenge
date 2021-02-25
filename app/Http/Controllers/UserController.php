<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $message = [
            'required' => 'El campo :attribute es obligatorio',
        ];

        $validate = $request->validate($rules,$message);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->action('CategoryController@index');
        } else {
            $errors = (['password' => ['El usuario o la contraseña son inválidos.']]);

            return back()->withErrors($errors);
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect('/');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('my_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $rules = [
            'name' => 'required',
            'user' => 'required|unique:users,username',
            'password' => 'required|required_with:confirm|same:confirm|min:8',
            'confirm' => 'required',
            'role' => 'required'
        ];

        $message = [
            'unique' => 'El nombre de usuario ingresado ya está en uso',
            'required' => 'El campo es obligatorio',
            'min' => 'La contraseña debe tener al menos :min caracteres',
            'same' => 'Las contraseñas deben coincidir'
        ];

        $validate = $request->validate($rules,$message);
        

        /* CREAR USUARIO */
        $user->name = $request->name;
        $user->username = $request->user;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        
        $user->save();

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {
        $user = User::where('id',$id)->first();
        return view('myApps',['user'=>$user]);
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
        //
    }
}
