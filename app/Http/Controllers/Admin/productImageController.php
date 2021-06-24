<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\product_images_upload;
use Illuminate\Http\Request;

class productImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImages = product_images_upload::all();
        return view('admin/productImageUpload/show',compact('productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();
        return view('admin/productImageUpload/create',compact('products'));
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
            'fileCollection' => 'required',
            'fileCollection.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        foreach ($request->fileCollection as $file){
            if($request->hasfile('fileCollection')) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $file = new product_images_upload();
                $file->product_id = $request->product[0];
                $file->image_path = $name;
                //dd($file);
                $file->save();
            }
        }
            return  redirect(route('image.index'));

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
        $products = product::all();
        $productImages = product_images_upload::where('product_image_id',$id)->first();
        return view('admin/productImageUpload/edit',compact('productImages','products'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product_images_upload::where('id',$id)->delete();
        return redirect()->back();
    }
}
