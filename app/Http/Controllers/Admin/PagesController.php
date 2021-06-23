<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = pages::all();
        return view('admin/Pages/show',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/Pages/create');
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
           'contentData'=>'required'
        ]);
        $file = $request->file('image');
        if($file->isvalid())
        {
            $destinationpath='aboutUsImg/';
            $imageName=date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationpath,$imageName);
        }
        $pages = new pages;
        $pages->name= $request->name;
        $pages->contentData= $request->contentData;
        $pages->image=$imageName;
        $pages->save();
        return redirect(route('pages.index'));
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
        $pages = pages::where('id',$id)->first();
        return view('admin/Pages/edit',compact('pages'));
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
            'contentData'=>'required'
        ]);
        $file = $request->file('image');
        if($file->isvalid())
        {
            $destinationpath='aboutUsImg/';
            $imageName=date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationpath,$imageName);
        }
        $pages =  pages::find($id);
        $pages->name= $request->name;
        $pages->contentData= $request->contentData;
        $pages->image=$imageName;
        $pages->save();
        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pages::where('id',$id)->delete();
        return redirect()->back();
    }
}
