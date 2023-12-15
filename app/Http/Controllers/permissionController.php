<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Permission::all();
        return view("admin.permission", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.permission-add");
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
            'name' => 'required|unique:permissions,name|regex:/^[\pL\s\-]+$/u',
        ], [
                'name.required' => 'Permission name is required',
            ]);

            $std = new Permission;
        $std->name = $request->input('name');
        $save=$std->save();

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
    public function edit($id)
    {
        $data = Permission::where("id", "=", $id)->first();
        return view('admin.permission-update', ["data" => $data]);
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
        $request->validate([
            'name' => "required|unique:permissions,name,$id,id|regex:/^[\pL\s\-]+$/u",
        ], [
            'name.required' => 'Permission name is required',
            'name.regex' => 'Format is invalid',
            'name.unique' => 'Permission name is already exit',
            'name.alpha_dash' => 'Allow only in alphabets',
        ]);
        $std = Permission::find($id);
        $std->name = $request->input('name');
        $std->update();

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
    
            $cat = Permission::find($id);
            $cat->delete();
            return response()->json([
                'msg' => 1,
            ]);
            
       
    }
}
