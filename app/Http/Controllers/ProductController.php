<?php

namespace App\Http\Controllers;

use App\Models\{product, Category, subcategory, supplier, quantity, product_attr};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product::all();
        return view("admin.product", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catadata = Category::all();
        $subcate = subcategory::all();
        $sup = supplier::all();
        $quantity = quantity::all();
        return view("admin.product-add", compact("catadata", "subcate", "sup", "quantity"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->type == "single") {
            $request->validate([
                'pcname' => 'required',
                'psname' => 'required',
                'psupplier' => 'required',
                'code' => 'required|unique:product_attrs,pcode',
                'pname' => 'required|regex:/^[\pL\s\-]+$/u',
                'unit' => 'required',
                'sale' => 'required',
                'pquantity' => 'required',
                'stock' => 'required',
                'status' => 'required',
                'pdes' => 'required|min:3|max:300',
                'files' => 'required',
                'files.*' => "image|mimes:jpeg,jpg,png|max:2000",
            ], [
                'pcname.required' => 'Category name is required.',
                'psname.required' => 'Sub Category name is required.',
                'psupplier.required' => 'Supplier name is required.',
                'code.required' => 'Code is required.',
                'code.unique' => 'Code must be unique.',
                'pname.required' => 'Product name is required.',
                'pname.regex' => 'Format is invalid.',
                'unit.required' => 'Unit price is required.',
                'sale.required' => 'Sale price is required.',
                'pquantity.required' => 'Quantity is required.',
                'stock.required' => 'Stock is required.',
                'status.required' => 'Status is required.',
                'pdes.required' => 'Description is required.',
                'files.required' => 'Image is required.',
                'files.*.image' => 'File must be an image.',
                'files.*.mimes' => 'Extension should be jpeg,png,jpg.',
                'files.*.max' => 'Out of lenght.',
            ]);
            $check = product::where('pcat', $request->pcname)->where('psubcat', $request->psname)->where('pname', $request->pname)->get();
            if ($check->count() == 0) {
                $std = new Product;
                $std->type = $request->input('type');
                $std->pcat = $request->input('pcname');
                $std->psubcat = $request->input('psname');
                $std->psupplier = $request->input('psupplier');
                $std->pname = $request->input('pname');
                $std->pquantity = $request->input('pquantity');
                $std->status = $request->input('status');
                $std->pdes = $request->input('pdes');
                $std->save();
                $pid = $std->pid;
                $attr = new product_attr;
                $attr->ap_id = $pid;
                $attr->pcode = $request->input('code');
                $attr->unit = $request->input('unit');
                $attr->srp = $request->input('sale');
                $attr->stock = $request->input('stock');
                if ($request->hasfile('files')) {
                    $images = array();
                    $pic = $request->file('files');
                    foreach ($pic as $pics) {
                        $exe = $pics->getClientOriginalExtension();
                        $file = rand(10000, 1000000) . "." . $exe;
                        $pics->move("./images/", $file);
                        $images[] = $file;
                    }
                    $pic = serialize($images);
                    $attr->image = $pic;
                }
                $attr->save();

                return response()->json([
                    'status' => 1,
                ]);
            } else {
                return response()->json([
                    'status' => 2,
                ]);
            }
        } else {
            $validate_array = [
                'pcname2' => 'required',
                'psname2' => 'required',
                'psupplier2' => 'required',
                'pname2' => 'required|regex:/^[\pL\s\-]+$/u',
                'pquantity2' => 'required',
                'code2.*' => 'required|distinct|unique:product_attrs,pcode',
                'stock2.*' => 'required',
                'status2' => 'required',
                'color2.*' => 'required',
                'size2.*' => "required",
                'sale2.*' => 'required',
                'unit2.*' => 'required',
                'pdes2' => 'required|min:3|max:300',
            ];
            $val = count($request['size2']);
            for ($x = 1; $x <= $val; $x++) {
                $validate_array['file' . $x] = 'required';
                $validate_array['file' . $x . '.*'] = 'image|mimes:jpeg,jpg,png|max:2000';
            }

            $vali = [
                'pcname2.required' => 'Category name is required.',
                'psname2.required' => 'Sub Category name is required.',
                'psupplier2.required' => 'Supplier name is required.',
                'pname2.required' => 'Product name is required.',
                'pname2.regex' => 'Format is invalid.',
                'pquantity2.required' => 'Quantity is required.',
                'status2.required' => 'Status is required.',
                'pdes2.required' => 'Description is required.',
                'code2.*.required' => 'Code is required.',
                'code2.*.distinct' => 'Dublicate value.',
                'code2.*.unique' => 'Code must be unique.',
                'stock2.*.required' => 'Stock is required.',
                'size2.*.required' => 'Size is required.',
                'unit2.*.required' => 'Unit price is required.',
                'sale2.*.required' => 'Sale price is required.',
                'color2.*.required' => 'Color is required.',
            ];
            for ($x = 1; $x <= $val; $x++) {
                $vali['file' . $x . '.required'] = 'Image is required.';
                $vali['file' . $x . '.*.image'] = 'File must be an image.';
                $vali['file' . $x . '.*.mimes'] = 'Extension should be jpeg,png,jpg.';
                $vali['file' . $x . '.*.max'] = 'Out of lenght.';
            }

            $this->validate($request, $validate_array, $vali);

            $check = product::where('pcat', $request->pcname)->where('psubcat', $request->psname)->where('pname', $request->pname)->get();
            if ($check->count() == 0) {
                $std = new Product;
                $std->type = $request->input('type2');
                $std->pcat = $request->input('pcname2');
                $std->psubcat = $request->input('psname2');
                $std->psupplier = $request->input('psupplier2');
                $std->pname = $request->input('pname2');
                $std->status = $request->input('status2');
                $std->pquantity = $request->input('pquantity2');
                $std->pdes = $request->input('pdes2');
                $std->save();
                //==================================variation=====================//
                $pid = $std->pid;
                $code2 = $request->input('code2');
                $stock2 = $request->input('stock2');
                $unit2 = $request->input('unit2');
                $srp2 = $request->input('sale2');
                $color2 = $request->input('color2');
                $count = 1;
                $images = array();
                foreach ($request->input("size2") as $key => $s) {
                    $attr = new product_attr;
                    $attr->ap_id = $pid;
                    $attr->pcode = $code2[$key];
                    $attr->stock = $stock2[$key];
                    $attr->unit = $unit2[$key];
                    $attr->srp = $srp2[$key];
                    $attr->color = $color2[$key];
                    $attr->size = $s;

                    foreach ($request->file('file' . $count) as $pics) {
                        $exe = $pics->getClientOriginalExtension();
                        $file = rand(10000, 1000000) . "." . $exe;
                        $pics->move("./images/", $file);
                        $images[] = $file;
                    }

                    $count++;
                    $pic = serialize($images);
                    $attr->image = $pic;
                    $attr->save();
                    $images = [];
                }

                return response()->json([
                    'status' => 1,
                ]);
            } else {
                return response()->json([
                    'status' => 2,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $val = subcategory::where("scname", "=", $id)->get();
        // $html='';
        // foreach($val as $val2){
        //     $html.='<option value="'.$val2->sid.'">'.$val2->sname.'</option>';
        // }
        // echo $html;
        return response()->json([
            'msg' => $val,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = product::where("pid", "=", $id)->first();
        $category = $data['pcat'];
        $scat = Category::find($category);
        $catdata = Category::all();

        $subcategory = $data['psubcat'];
        $subcat = subcategory::find($subcategory);
        $subdata = subcategory::where("scname", "=", $category)->get();

        $supplier = $data['psupplier'];
        $supp = supplier::find($supplier);
        $supdata = supplier::all();

        $quantity = $data['pquantity'];
        $quant = quantity::find($quantity);
        $quantdata = quantity::all();

        $attr = product_attr::where("ap_id", "=", $id)->get();

        return view('admin.product-update', ["data" => $data, "catdata" => $catdata, "scat" => $scat, "subdata" => $subdata, "subcat" => $subcat, "supdata" => $supdata, "supp" => $supp, "quantdata" => $quantdata, "quant" => $quant, "attr" => $attr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->type == "single") {
            $request->validate([
                'pcname' => 'required',
                'psname' => 'required',
                'psupplier' => 'required',
                'code' => "required|unique:product_attrs,pcode,$id,ap_id",
                'pname' => 'required|regex:/^[\pL\s\-]+$/u',
                'unit' => 'required',
                'sale' => 'required',
                'pquantity' => 'required',
                'stock' => 'required',
                'status' => 'required',
                'pdes' => 'required|min:3|max:300',
                'files.*' => "image|mimes:jpeg,jpg,png|max:2000",
            ], [
                'pcname.required' => 'Category name is required.',
                'psname.required' => 'Sub Category name is required.',
                'psupplier.required' => 'Supplier name is required.',
                'code.required' => 'Code is required.',
                'code.unique' => 'Code must be unique.',
                'pname.required' => 'Product name is required.',
                'pname.regex' => 'Format is invalid.',
                'unit.required' => 'Unit price is required.',
                'sale.required' => 'Sale price is required.',
                'pquantity.required' => 'Quantity is required.',
                'stock.required' => 'Stock is required.',
                'status.required' => 'Status is required.',
                'pdes.required' => 'Description is required.',
                'files.*.image' => 'File must be an image.',
                'files.*.mimes' => 'Extension should be jpeg,png,jpg.',
                'files.*.max' => 'Out of lenght.',
            ]);
            $check = product::where('pcat', $request->pcname)->where('psubcat', $request->psname)->where('pname', $request->pname)->where('pid', '!=', $id)->get();
            if ($check->count() == 0) {
                $std = Product::find($id);
                $std->type = $request->input('type');
                $std->pcat = $request->input('pcname');
                $std->psubcat = $request->input('psname');
                $std->psupplier = $request->input('psupplier');
                $std->pquantity = $request->input('pquantity');
                $std->pname = $request->input('pname');
                $std->status = $request->input('status');
                $std->pdes = $request->input('pdes');
                $std->update();
                $attr = Product_attr::where("ap_id", $id)->get();
                $attrs = $attr[0];
                $attrs->pcode = $request->input('code');
                $attrs->unit = $request->input('unit');
                $attrs->srp = $request->input('sale');
                $attrs->stock = $request->input('stock');

                if ($request->hasfile('files')) {
                    //==================================delete previous images=====================//
                    $p = unserialize($attrs->image);
                    foreach ($p as $img) {
                        File::delete('./images/' . $img);
                    }

                    $images = array();
                    $pic = $request->file('files');
                    foreach ($pic as $pics) {
                        $exe = $pics->getClientOriginalExtension();
                        $file = rand(10000, 1000000) . "." . $exe;
                        $pics->move("./images/", $file);
                        $images[] = $file;
                    }
                    $pic = serialize($images);

                    $attrs->image = $pic;
                } else {
                    $attrs->image = $attrs->image;
                }
                $attrs->update();

                return response()->json([
                    'status' => 1,
                ]);
            } else {
                return response()->json([
                    'status' => 2,
                ]);
            }
        } else {
            $validate_array = [
                'pcname2' => 'required',
                'psname2' => 'required',
                'psupplier2' => 'required',
                'pname2' => 'required|regex:/^[\pL\s\-]+$/u',
                'pquantity2' => 'required',
                'code2.*' => "required|distinct|unique:product_attrs,pcode,$id,ap_id",
                'stock2.*' => 'required',
                'status2' => 'required',
                'color2.*' => 'required',
                'size2.*' => "required",
                'sale2.*' => 'required',
                'unit2.*' => 'required',
                'pdes2' => 'required|min:3|max:300',
            ];
            $val = $request['size2'];
            $id2 = $request['pa_id2'];
            $x = 0;
            $i = 0;
            foreach ($val as $key => $as) {


                if ($id2[$key] != "") {
                    $x++;
                    $validate_array['file' . $x . '.*'] = 'image|mimes:jpeg,jpg,png|max:2000';
                } else {
                    $i++;
                    $validate_array['files2' . $i] = 'required';
                    $validate_array['files2' . $i . '.*'] = 'image|mimes:jpeg,jpg,png|max:2000';
                }
            }


            $vali = [
                'pcname2.required' => 'Category name is required.',
                'psname2.required' => 'Sub Category name is required.',
                'psupplier2.required' => 'Supplier name is required.',
                'pname2.required' => 'Product name is required.',
                'pname2.regex' => 'Format is invalid.',
                'pquantity2.required' => 'Quantity is required.',
                'status2.required' => 'Status is required.',
                'pdes2.required' => 'Description is required.',
                'code2.*.required' => 'Code is required.',
                'code2.*.distinct' => 'Dublicate value.',
                'code2.*.unique' => 'Code must be unique.',
                'stock2.*.required' => 'Stock is required.',
                'size2.*.required' => 'Size is required.',
                'unit2.*.required' => 'Unit price is required.',
                'sale2.*.required' => 'Sale price is required.',
                'color2.*.required' => 'Color is required.',
            ];
            $y = 0;
            $s = 0;
            foreach ($val as $key => $as) {

                if ($id2[$key] != "") {
                    $y++;
                    $vali['file' . $y . '.*.image'] = 'File must be an image.';
                    $vali['file' . $y . '.*.mimes'] = 'Extension should be jpeg,png,jpg.';
                    $vali['file' . $y . '.*.max'] = 'Out of lenght.';
                } else {
                    $s++;
                    $vali['files2' . $s . '.required'] = 'Image is required.';
                    $vali['files2' . $s . '.*.image'] = 'File must be an image.';
                    $vali['files2' . $s . '.*.mimes'] = 'Extension should be jpeg,png,jpg.';
                    $vali['files2' . $s . '.*.max'] = 'Out of lenght.';
                }
            }


            $this->validate($request, $validate_array, $vali);

            $check = product::where('pcat', $request->pcname)->where('psubcat', $request->psname)->where('pname', $request->pname)->where('pid', '!=', $id)->get();
            if ($check->count() == 0) {
                $std = Product::find($id);
                $std->type = $request->input('type2');
                $std->pcat = $request->input('pcname2');
                $std->psubcat = $request->input('psname2');
                $std->psupplier = $request->input('psupplier2');
                $std->pname = $request->input('pname2');
                $std->status = $request->input('status2');
                $std->pquantity = $request->input('pquantity2');
                $std->pdes = $request->input('pdes2');
                $std->update();
                //==================================variation=====================//

                $pa_id2 = $request->input('pa_id2');
                $code2 = $request->input('code2');
                $stock2 = $request->input('stock2');
                $unit2 = $request->input('unit2');
                $srp2 = $request->input('sale2');
                $color2 = $request->input('color2');
                $count = 1;
                $count2 = 1;
                $images = array();

                foreach ($request->input("size2") as $key => $s) {
                    //    echo $count;

                    if ($pa_id2[$key] != '') {

                        // print_r($request->file('file'.$count));

                        $attr = product_attr::find($pa_id2[$key]);
                        $attr->pcode = $code2[$key];
                        $attr->stock = $stock2[$key];
                        $attr->unit = $unit2[$key];
                        $attr->srp = $srp2[$key];
                        $attr->color = $color2[$key];
                        $attr->size = $s;
                        if ($request->hasfile('file' . $count)) {

                            //==================================delete previous images=====================//

                            $p = unserialize($attr->image);
                            foreach ($p as $img) {
                                File::delete('./images/' . $img);
                            }

                            $pic = $request->file('file' . $count);
                            foreach ($pic as $pics) {
                                $exe = $pics->getClientOriginalExtension();
                                $file = rand(10000, 1000000) . "." . $exe;
                                $pics->move("./images/", $file);
                                $images[] = $file;
                            }

                            $pic = serialize($images);
                            $attr->image = $pic;

                            $images = [];
                        } else {
                            $attr->image = $attr->image;
                        }
                        $attr->update();
                        $count++;
                    } else {

                        //==================================Add More Products=====================//
                        $attr = new product_attr;
                        $attr->ap_id = $id;
                        $attr->pcode = $code2[$key];
                        $attr->stock = $stock2[$key];
                        $attr->unit = $unit2[$key];
                        $attr->srp = $srp2[$key];
                        $attr->color = $color2[$key];
                        $attr->size = $s;

                        foreach ($request->file('files2' . $count2) as $pics) {
                            $exe = $pics->getClientOriginalExtension();
                            $file = rand(10000, 1000000) . "." . $exe;
                            $pics->move("./images/", $file);
                            $images[] = $file;
                        }

                        $pic = serialize($images);
                        $attr->image = $pic;
                        $attr->save();
                        $images = [];
                        $count2++;
                    }
                }
                return response()->json([
                    'status' => 1,
                ]);
            } else {
                return response()->json([
                    'status' => 2,
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attr = product_attr::where("ap_id", $id)->get();
        foreach ($attr as $attrs) {
            $p = unserialize($attrs->image);
            foreach ($p as $img) {
                File::delete('./images/' . $img);
            }
            $attrs->delete();
        }
        $std = product::find($id);
        $std->delete();
        return response()->json([
            'msg' => 1,
        ]);
    }


    public function remove($id)
    {
        $attr = product_attr::where("attr_id", $id)->get();
        $attrs = $attr[0];
        $p = unserialize($attrs->image);
        foreach ($p as $img) {
            File::delete('./images/' . $img);
        }
        $attrs->delete();
        return response()->json([
            'msg' => 1,
        ]);
    }
}
