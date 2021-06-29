<?php

namespace App\Http\Controllers;

use App\Models\contact_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
           'name'=>'required|string',
            'email'=>'required|email',
            'subject'=>'required',
            'message' =>'required',
        ]);


        $name=$request['name'];
        $email=$request['email'];
        $title=$request['subject'];
        $message=$request['message'];

        $contact = new contact_us;
        $contact->name= $request['name'];
        $contact->email = $request['email'];
        $contact->subject = $request['subject'];
        $contact->message = $request['message'];
        $contact->save();
        $data = array('name'=>"Admin");

        Mail::raw($message, function($message) use ($title, $name, $email){
            $message->to('admin@gmail.com', 'admin')->subject
            ($title);
            $message->from($email, $name);
        });
        echo "Your email has been send!";

        return response()->json(null, 200);
    }

    public function contacts(){
        $contacts = contact_us::all();
        return view('admin/Contacts/show',compact('contacts'));
    }


}
