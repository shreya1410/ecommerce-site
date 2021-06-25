<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\main_category;
use App\Models\sub_category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $subcategory = sub_category::select("main_categories.main_category_name as main_category_name","sub_categories.*")
            ->join("main_categories","main_categories.id","sub_categories.main_category_id")
                ->get();
            return view('admin/Subcategory/show',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincategories = main_category::all();
        return view('admin/Subcategory/create',compact('maincategories'));
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
               'sub_category_name'=>'required',
               'sub_category_description'=>'required'
            ]);

            $subcategory = new sub_category;
            $subcategory->main_category_id=$request->maincategory[0];
            $subcategory->sub_category_name= $request->sub_category_name;
            $subcategory->sub_category_description=$request->sub_category_description;
            $subcategory->save();

            return redirect(route('subcategory.index'));
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
        $maincategory = main_category::all();
        $subcategory = sub_category::where('sub_category_id',$id)->first();
        return view('admin/Subcategory/edit',compact('maincategory','subcategory'));
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
            'sub_category_name'=>'required',
            'sub_category_description'=>'required'
        ]);

        $subcategory = sub_category::find($id);
        $subcategory->main_category_id=$request->maincategory[0];
        $subcategory->sub_category_name= $request->sub_category_name;
        $subcategory->sub_category_description=$request->sub_category_description;
        $subcategory->save();

        return redirect(route('subcategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sub_category::where('sub_category_id',$id)->delete();
        return redirect()->back();
    }
}
