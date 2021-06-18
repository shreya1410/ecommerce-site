<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('admin/products/show',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('admin/products/create',compact('categories'));
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
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);

        if($request->hasFile('image')){
            //storage/app/public store
            $imageName =$request->image->store('public');
        }
        $product = new product;
        $product->image = $imageName;
        $product->name= $request->name;
        $product->description= $request->description;
        $product->price = $request->price;

        $product->save();
        $product->categories()->sync($request->category);

        return  redirect(route('product.index'));
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
        //  $product = product::where('id',$id)->first();
        $product = product::with('categories')->where('id',$id)->first();
        $categories = category::all();
        return view('admin/products/edit',compact('categories','product'));
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
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);
        if($request->hasFile('image')){
            //storage/app/public store
            $imageName =$request->image->store('public');
        }

        $product =  product::find($id);
        $product->image= $imageName;
        $product->name= $request->name;
        $product->description= $request->description;
        $product->price = $request->price;
        $product->categories()->sync($request->category);
        $product->save();

        return  redirect(route('product.index'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where('id',$id)->delete();
        return redirect()->back();
    }
}
