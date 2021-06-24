<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\main_category;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepository;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $category;
    public function __construct(CategoryRepository  $category)
    {
        $this->category=$category;

    }
    public function index()
    {
       //$categories = category::all();
        $categories = $this->category->getAllCategory();
       return view('admin/categories/show',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $attributes = $request->except(['_token']);
       // dd($request->except('_token'));
        $this->validate($request,[
           'name'=>'required',
            'category_description'=>'required'
        ]);

        $category = new category;
        $category->name= $request->name;
        $category->category_description= $request->category_description;
        $category->save();

    //  $this->category->create($attributes);

        return redirect(route('category.index'));
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
        $cat = category::where('id',$id)->first();
        return view('admin/categories/edit',compact('cat'));

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
            'category_description'=>'required',
        ]);

        $category =  category::find($id);
        $category->name= $request->name;
        $category->category_description= $request->category_description;
        $category->save();

      //  $id= $request->get('id',$id);
       // $this->category->update($id,$request->except('_token'));

        return redirect(route('category.index'));
    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function destroy(Request $request,$id)
    {
        category::where('id',$id)->delete();
//        $id= $request->get('id',$id);
//        $this->category->delete($id);
        return redirect()->back();
    }
}
