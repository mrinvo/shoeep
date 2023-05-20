<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function show($id){
        $contact = Contact::find($id);
        return view('admin.contact.show',compact('contact'));
    }
}