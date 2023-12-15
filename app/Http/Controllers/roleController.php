<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Gate;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        return view("admin.role", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Permission::all();
        return view("admin.role-add", compact("data"));
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
            'name' => 'required|unique:roles,name|regex:/^[\pL\s\-]+$/u',
            'permission' => 'required',
        ], [
                'name.required' => 'Role name is required',
                'permission.required' => 'Permission name is required',
            ]);
            $role = Role::create(['name' => $request->name]);
            $permissions = Permission::whereIn('id', $request->permission)->pluck('name')->toArray();
            $role->syncPermissions($permissions);

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
    public function edit(role $role)
    {
        $permissions = Permission::get();
        $role->$permissions;
        return view('admin.role-update', ["role" => $role,"permissions" => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role)
    {
       
        $request->validate([
            'name' => "required|unique:roles,name,$role->id,id|regex:/^[\pL\s\-]+$/u",
            'permission' => "required",
        ], [
            'name.required' => 'Role name is required',
            'name.regex' => 'Format is invalid',
            'name.unique' => 'Role name is already exit',
            'name.alpha_dash' => 'Allow only in alphabets',
            'permission.required' => 'Permission name is required',
        ]);
        $role->update(['name' => $request->name]);
        $permissions = Permission::whereIn('id', $request->permission)->pluck('name')->toArray();
        $role->syncPermissions($permissions);
        

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
        $cat = role::find($id);
        $cat->delete();
        return response()->json([
            'msg' => 1,
        ]);
    }
}
