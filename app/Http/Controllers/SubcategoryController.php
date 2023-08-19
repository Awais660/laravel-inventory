<?php

namespace App\Http\Controllers;


use App\Models\{subcategory,Category,product};
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = subcategory::all();
        return view("admin.subcategory", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catadata = category::all();
        return view("admin.subcategory-add", compact("catadata"));
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
            'cname' => 'required',
            'sname' => "required|regex:/^[\pL\s\-]+$/u",
            'sdes' => 'required',
        ], [
                'cname.required' => 'Category is required',
                'sname.required' => 'Sub Category name is required',
                'sname.regex' => 'Format is invalid',
                'sname.unique' => 'Sub Category name is alrea   dy exit',
                'sname.alpha_dash' => 'Allow only in alphabets',
                'cdes.required' => 'Description is required',
            ]);
            $check=subcategory::where('scname',$request->cname)->where('sname',$request->sname)->get();
            if($check->count()==0){
                $std = new subcategory;
                $std->scname = $request->input('cname');
                $std->sname = $request->input('sname');
                $std->sdes = $request->input('sdes');
                $std->save();
                return response()->json([
                    'status' => 1,
                ]);
            }else{
                return response()->json([
                    'status' => 2,
                ]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=subcategory::where("sid","=",$id)->first();
        $category=$data['scname'];
        $scat=Category::find($category);
        $catadata = Category::all();
        return view('admin.subcategory-update',["data"=>$data,"catadata"=>$catadata,"scat"=>$scat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cname' => 'required',
            'sname' => "required|regex:/^[\pL\s\-]+$/u",
            'sdes' => 'required',
        ], [
                'cname.required' => 'Category is required',
                'sname.required' => 'Sub Category name is required',
                'sname.regex' => 'Format is invalid',
                'sname.unique' => 'Sub Category name is already exit',
                'sname.alpha_dash' => 'Allow only in alphabets',
                'cdes.required' => 'Description is required',
            ]);
            $check=subcategory::where('scname',$request->cname)->where('sname',$request->sname)->where('sid',"!=",$id)->get();
            if($check->count()==0){
                $std =subcategory::find($id);
                $std->scname = $request->input('cname');
                $std->sname = $request->input('sname');
                $std->sdes = $request->input('sdes');
                $std->update();
                return response()->json([
                    'status' => 1,
                ]);
            }else{
                return response()->json([
                    'status' => 2,
                ]);
            }
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $std=product::where("psubcat","=","$id")->count();
        if($std==0){
        $std=subcategory::find($id);
        $std->delete();
        return response()->json([
            'msg' => 1,
        ]);
    }else{
        return response()->json([
            'msg' => 2,
        ]);
}
    }
}