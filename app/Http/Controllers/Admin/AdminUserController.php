<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\adminUser;
use Illuminate\Http\Request;
use App\Repositories\AdminUser\AdminUserRepository;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $adminuser;
    public function __construct(AdminUserRepository $adminuser){
        $this->adminuser=$adminuser;
    }

    public function index()
    {

        $adminusers = $this->adminuser->getAllAdmins();
       // $adminusers = adminUser::all();
        return view('admin/adminuser/show',compact('adminusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/adminuser/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->except(['_token']);
        $this->validate($request,[
            'admin_name'=>'required',
            'admin_email'=>'required',
            'admin_address'=>'required',
            'contact'=>'required'
        ]);
//        $adminuser = new adminUser;
//        $adminuser->admin_name= $request->admin_name;
//        $adminuser->admin_email= $request->admin_email;
//        $adminuser->admin_address= $request->admin_address;
//        $adminuser->contact= $request->contact;
//        $adminuser->save();

        $this->adminuser->create($attributes);

        return redirect(route('adminuser.index'));
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
        $adminuser = adminUser::where('id',$id)->first();
        return view('admin/adminuser/edit',compact('adminuser'));
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
            'admin_name'=>'required',
            'admin_email'=>'required',
            'admin_address'=>'required',
            'contact'=>'required'
        ]);
//        $adminuser =  adminUser::find($id);
//        $adminuser->admin_name= $request->admin_name;
//        $adminuser->admin_email= $request->admin_email;
//        $adminuser->admin_address= $request->admin_address;
//        $adminuser->contact= $request->contact;
//        $adminuser->save();

        $id= $request->get('id',$id);
        $this->adminuser->update($id,$request->except('_token'));

        return redirect(route('adminuser.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      //  adminUser::where('id',$id)->delete();
        $id= $request->get('id',$id);
        $this->adminuser->delete($id);
        return redirect()->back();
    }
}
