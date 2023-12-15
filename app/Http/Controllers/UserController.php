<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $data = admin::all();
        return view("admin.users", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Role::all();
        return view("admin.users-add", compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:admins,email',
            'password' => 'required',
            'role' => 'required',
        ], [
                'name.required' => 'name is required',
                'role.required' => 'Role name is required',
            ]);
            $password = Hash::make($request->password);
            $user = admin::create(['name' => $request->name,
                                   'email' => $request->email,
                                   'password' => $password]);
            $roles = Role::whereIn('id', $request->role)->pluck('name')->toArray();
            $user->syncRoles($roles);

        return response()->json([
            'status' => 1,
        ]);
 
        return response()->json([
            'status' => 2,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $user)
    {
        $roles = Role::get();
        $user->$roles;
        return view('admin.users-update', ["user" => $user,"roles" => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $user)
    {
        $request->validate([
            'name' => "required|regex:/^[\pL\s\-]+$/u",
            'email' => "required|unique:admins,name,$user->id,id",
            'password' => "required",
            'role' => "required",
        ], [
            'name.required' => 'Role name is required',
            'name.regex' => 'Format is invalid',
            'name.alpha_dash' => 'Allow only in alphabets',
            'role.required' => 'Role name is required',
        ]);
        $password = Hash::make($request->password);
        $user->update(['name' => $request->name,'email' => $request->email,'password' => $password]);
        $roles = Role::whereIn('id', $request->role)->pluck('name')->toArray();
        $user->syncRoles($roles);
        

        return response()->json([
            'status' => 1,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = admin::find($id);
        $cat->delete();
        return response()->json([
            'msg' => 1,
        ]);
    }
}
