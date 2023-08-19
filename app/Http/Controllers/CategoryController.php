<?php

namespace App\Http\Controllers;

use App\Models\{Category,subcategory};
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view("admin.category", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category-add");
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
            'cname' => 'required|unique:categories,cname|regex:/^[\pL\s\-]+$/u',
            'cdes' => 'required',
        ], [
                'cname.required' => 'Category name is required',
                'cname.regex' => 'Format is invalid',
                'cname.unique' => 'Category name is already exit',
                'cdes.required' => 'Description is required',
            ]);

        $std = new Category;
        $std->cname = $request->input('cname');
        $std->cdes = $request->input('cdes');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $val = Category::all();
        return response()->json([
            'data' => $val,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::where("cid", "=", $id)->first();
        return view('admin.category-update', ["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'cname' => "required|unique:categories,cname,$id,cid|regex:/^[\pL\s\-]+$/u",
            'cdes' => 'required',
        ], [
            'cname.required' => 'Category name is required',
            'cname.regex' => 'Format is invalid',
            'cname.unique' => 'Category name is already exit',
            'cname.alpha_dash' => 'Allow only in alphabets',
            'cdes.required' => 'Description is required',
        ]);
        $std = Category::find($id);
        $std->cname = $request->input('cname');
        $std->cdes = $request->input('cdes');
        $std->update();

        return response()->json([
            'status' => 1,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($sid)
    {
        $std=subcategory::where("scname","=","$sid")->count();
        if($std==0){
            $cat = Category::find($sid);
            $cat->delete();
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