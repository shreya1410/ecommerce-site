<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\product_item;
use App\Models\sub_category;
use Illuminate\Http\Request;

class ProductItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product_item::select("sub_categories.sub_category_name as category_name","product_items.*")
            ->join("sub_categories","sub_categories.sub_category_id","product_items.sub_category_id")
            ->get();
        return view('admin/ProductItems/show',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = sub_category::all();
        return view('admin/ProductItems/create',compact('subcategories'));
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
                'name'=>'required',
                'slug'=>'required',
                'description'=>'required',
                'price'=>'required',
                'image'=>'required'
            ]);

        if($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;

            }
        }

            $productitem = new product_item;
            $productitem->sub_category_id = $request->subcategory[0];
            $productitem->image= json_encode($data);
            $productitem->name= $request->name;
            $productitem->slug = $request->slug;
            $productitem->description= $request->description;
            $productitem->price = $request->price;
            $productitem->save();

            return redirect(route('products.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $subcategory = sub_category::all();
            $product = product_item::where('product_id',$id)->first();
            return view('admin/ProductItems/edit',compact('subcategory','product'));
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
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'price'=>'required',
             'image'=>'required'
        ]);


        if($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;

            }
        }
        $productitem =  product_item::find($id);
        $productitem->sub_category_id = $request->subcategory[0];
        $productitem->image= json_encode($data);
        $productitem->name= $request->name;
        $productitem->slug = $request->slug;
        $productitem->description= $request->description;
        $productitem->price = $request->price;
        $productitem->save();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            product_item::where('product_id',$id)->delete();
            return redirect()->back();
    }
}
