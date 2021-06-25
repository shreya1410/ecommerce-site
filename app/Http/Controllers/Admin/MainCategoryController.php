<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\main_category;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcategories = main_category::all();
        return view('admin/mainCategory/show',compact('allcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/mainCategory/create');
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
           'main_category_name'=>'required',
           'main_category_description'=>'required',
            'main_category_image'=>'required'
        ]);
        $file = $request->file('main_category_image');
        if($file->isvalid())
        {
            $destinationpath='mainCategoryImg/';
            $imageName=date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationpath,$imageName);
        }
        $mainCategories = new main_category;
        $mainCategories->main_category_name=$request->main_category_name;
        $mainCategories->main_category_description = $request->main_category_description;
        $mainCategories->main_category_image =$imageName;
        $mainCategories->save();

        return redirect(route('maincategory.index'));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $maincategory = main_category::where('id',$id)->first();
       // dd($maincategory);
        return view('admin/mainCategory/edit',compact('maincategory'));


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
            'main_category_name'=>'required',
            'main_category_description'=>'required',
              'main_category_image'=>'required'
        ]);
        $file = $request->file('main_category_image');
        if($file->isvalid())
        {
            $destinationpath='mainCategoryImg/';
            $imageName=date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationpath,$imageName);
        }
        $maincategory = main_category::find($id);
        $maincategory->main_category_name=$request->main_category_name;
        $maincategory->main_category_description = $request->main_category_description;
        $maincategory->main_category_image =$imageName;
        $maincategory->save();

        return redirect(route('maincategory.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        main_category::where('id',$id)->delete();
        return redirect()->back();

    }
}
