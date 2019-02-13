<?php

namespace App\Http\Controllers\Backend\Organisation\Superadmin;


use Illuminate\Http\Request;
use App\Models\Standard\User;
use App\Models\Standard\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $countries = Country::with('counties', 'towns')->get();
        // dd($countries);
        $users = User::with('roles', 'permissions')->get();
        // dd($users);
        return response()-> json([
            'users'=>$users,
            // 'countries' => $countries,

        ], 200);
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
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password'=>'required|min:6',
            'user_type' => 'required|min:3',
            'permissions'=>'required',
            'roles'=>'required',
        ]);

        $user= User::create([
            'first_name'       => $request ['first_name'],
            'last_name'        => $request ['last_name'],
            'email'           => $request ['email'],
            'password'        => Hash::make($request ['password']),
            'user_type'        => $request ['user_type'],
            'active'           => true,
            'confirmed'        => true,
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
        ]);

        $user->assignRole($request ['roles']);
        $user->syncPermissions($request ['permissions']);

        return ['message' => 'User Created successfully'];

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles', 'permissions')->find($id);
        // dd($user);
        return response()-> json([
            'user'=>$user
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles', 'permissions')->find($id);
        // dd($user);
        return response()-> json([
            'user'=>$user
        ], 200);
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
        $user = User::findOrFail($id);
        $this->validate($request,[
            'first_name'=>'required|string|max:191',
            'last_name'=>'required|string|max:191',
            'email'=>'required|string|email|max:191|unique:users,email,'.$user->id,
            'password'=>'sometimes|required|min:6',
            'user_type' => 'sometimes|required|min:3',
            'permissions'=>'sometimes|required',
            'roles'=>'sometimes|required',
        ]);
        $user->update($request->all());
        return ['message', 'update the user info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ['message'=>'User Deleted'];
    }
}
