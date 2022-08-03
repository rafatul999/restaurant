<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request){

        $this->validate($request,[
        'name' => 'required',
        'email' => 'required',// | email | unique:contact,email
        'subject' => 'required',
        'message' => 'required'
        ]);
        $contact = new Contact();
        $contact ->name = $request->name;
        $contact ->email = $request->email;
        $contact ->subject=$request->subject;
        $contact ->message=$request->message;
        $contact->status=false;
        $contact->save();
        return redirect()->back();

    }
}
