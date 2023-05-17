<?php

namespace App\Http\Controllers\api;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function index(){
        $blogs = Blog::select([
            'title_'. app()->getLocale() . ' as title',
            'description'. app()->getLocale() . ' as description',
            'image'
        ])->get();

        $response = [
            'code' => 201,
            'data' => $blogs
        ];

        return response($response);
    }
    public function show($id){
        $blogs = Blog::select([
            'title_'. app()->getLocale() . ' as title',
            'description'. app()->getLocale() . ' as description',
            'image'
        ])->where('id',$id)->first();

        $response = [
            'code' => 201,
            'data' => $blogs
        ];

        return response($response);
    }
}
