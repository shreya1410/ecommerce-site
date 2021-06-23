<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\product;
use Illuminate\Http\Request;

class FileController extends Controller
{
        public function index(){
            $files = File::all();
            return view('admin/productImage/show',compact('files'));
        }

        public function create(){
            $products = product::all();
            return view('admin/productImage/create',compact('products'));
        }

        public function store(Request $request,product $product)
        {
            $request->validate([
                'fileCollection' => 'required',
                'fileCollection.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,xlx,xls,pdf|max:2048'
            ]);

            if($request->hasfile('fileCollection')) {
                foreach($request->file('fileCollection') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path().'/uploads/', $name);
                    $data[] = $name;
                    $file= new File();
                    $file->product_id= json_encode($request->product);
                    $file->name=$name;
                    $file->path=$name;

                    $file->save();
                }


              //  $file->product_id= $request->product;

//                $data=[
//                  'product_id'=> json_encode($request->product),
//                    //$file->product_id= json_encode($p_id),
//                    $file->name=json_encode($data),
//                    $file->path=json_encode($data),
//                ];
               // dd($file);
              // $success = $file->create($data);

                return  redirect(route('productimage.index'));
            }
        }


        public function edit($id)
        {
            $file = File::where('id',$id)->first();
            $products = product::all();
            return view('admin/productImage/edit',compact('products','file'));
        }


        public function update(Request $request,$id)
        {
            $request->validate([
                'fileCollection' => 'required',
                'fileCollection.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,xlx,xls,pdf|max:2048'
            ]);
            if($request->hasfile('fileCollection')) {
                foreach($request->file('fileCollection') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path().'/uploads/', $name);
                    $data[] = $name;
                }
                $file= File::find($id);
                $file->product_id= json_encode($request->product);
                $file->name=json_encode($data);
                $file->path=json_encode($data);
                $file->save();
                return  redirect(route('productimage.index'));
            }
        }



        public function destroy($id)
        {
            File::where('id',$id)->delete();
            return redirect()->back();
        }
}
