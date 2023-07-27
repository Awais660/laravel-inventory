<?php

namespace App\Http\Controllers;

use App\Models\quantity;
use Illuminate\Http\Request;

class QuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=quantity::all();
        return view("admin.quantity", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.quantity-add");
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
            'qname' => 'required|unique:quantities,quantity|regex:/^[\pL\s\-]+$/u',
            'qdes' => 'required',
        ], [
                'qname.required' => 'Quantity name is required',
                'qname.regex' => 'Format is invalid',
                'qname.unique' => 'Quantity name is already exit',
                'qname.alpha_dash' => 'Allow only in alphabets',
                'qdes.required' => 'Description is required',
            ]);

        $std = new quantity;
        $std->quantity = $request->input('qname');
        $std->qdes = $request->input('qdes');
        $std->save();

        return response()->json([
            'status' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function show(quantity $quantity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = quantity::where("qid", "=", $id)->first();
        return view('admin.quantity-update', ["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'qname' => "required|unique:quantities,quantity,$id,qid|regex:/^[\pL\s\-]+$/u",
            'qdes' => 'required',
        ], [
            'qname.required' => 'Quantity name is required',
            'qname.regex' => 'Format is invalid',
            'qname.unique' => 'Quantity name is already exit',
            'qname.alpha_dash' => 'Allow only in alphabets',
            'qdes.required' => 'Description is required',
        ]);
        $std = quantity::find($id);
        $std->quantity = $request->input('qname');
        $std->qdes = $request->input('qdes');
        $std->update();

        return response()->json([
            'status' => 1,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $std=quantity::find($id);
        $std->delete();
        return response()->json([
            'msg' => 1,
        ]);
    }
}
