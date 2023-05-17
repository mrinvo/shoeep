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
        $data = $request->all();

        $contact =  Contact::create($data);

        $response = [
            'code' => 201,
            'data' => $contact,
            'message' => 'تم ارسال الطلب'
        ];

        return response($response);
    }
}
