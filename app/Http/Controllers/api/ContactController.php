<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function store($request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'email',
            'phone' => 'required|numeric',

        ]);


        $file = $request->file('file')->store('api/files','public');

        $contact =  Contact::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service_type' => $request->service_type,
            'service_details' => $request->service_details,
            'file' => asset('storage/'.$file),

        ]);

        $response = [
            'code' => 201,
            'data' => $contact,
            'message' => 'تم ارسال الطلب'
        ];

        return response($response);
    }
}
