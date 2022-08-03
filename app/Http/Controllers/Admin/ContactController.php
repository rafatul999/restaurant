<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
     $contacts = Contact::all();
     return view('admin.contact.index', compact('contacts'));
    }
    public function status($id){
        $contact = Contact::find($id);
        $contact-> status = true;
        $contact->save();
        return redirect()->route('contact.index');
    }
    public function view($id){
        $contact = Contact::find($id);
        return view('admin.contact.view', compact('contact'));
    }
     public function destroy($id) {
        Contact::find($id)->delete();
        //Toastr::success('Your reservation successfully ', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('contact.index');
    }
}
