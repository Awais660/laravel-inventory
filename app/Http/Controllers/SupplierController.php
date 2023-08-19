<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::all();
        return view("admin.supplier", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.supplier-add");
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
            "sname"=>"required|regex:/^[\pL\s\-]+$/u",
            "semail" => 'required|unique:suppliers,sup_email|email',
            "snumber" => 'required|unique:suppliers,sup_number|digits:11',
        ],[
            'sname.required' => 'Supplier name is required',
            'sname.regex' => 'Format is invalid',
            'sname.alpha_dash' => 'Allow only in alphabets',
            'semail.required' => 'Email is required',
            'semail.unique' => 'Email is already exit',
            'semail.email' => 'Please enter a valid email',
            'snumber.required' => 'Number is required',
            'snumber.unique' => 'Number is already exit',
            'snumber.digits' => 'Length must be equal 11',
        ]);
        $std=new supplier;
        $std->sup_name=$request->input("sname");
        $std->sup_email=$request->input("semail");
        $std->sup_number=$request->input("snumber");
        $std->save();
        return response()->json([
            "status"=>1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($sid)
    {
        $data=supplier::where("sup_id","=",$sid)->first();
        return view("admin.supplier-update",["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sid)
    {
        $request->validate([
            "sname"=>"required|regex:/^[\pL\s\-]+$/u",
            "semail" => "required|unique:suppliers,sup_email,$sid,sup_id|email",
            "snumber" => "required|unique:suppliers,sup_number,$sid,sup_id|digits:11",
        ],[
            'sname.required' => 'Supplier name is required',
            'sname.regex' => 'Format is invalid',
            'sname.alpha_dash' => 'Allow only in alphabets',
            'semail.required' => 'Email is required',
            'semail.unique' => 'Email is already exit',
            'semail.email' => 'Please enter a valid email',
            'snumber.required' => 'Number is required',
            'snumber.unique' => 'Number is already exit',
            'snumber.digits' => 'Length must be equal 11',
        ]);
        $std=supplier::find($sid);
        $std->sup_name=$request->input("sname");
        $std->sup_email=$request->input("semail");
        $std->sup_number=$request->input("snumber");
        $std->update();
        return response()->json([
            "status"=>1,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($sid)
    {
        $cat = supplier::find($sid);
       
            $cat->delete();
            return response()->json([
                'msg' => 1,
            ]);
    }
}
