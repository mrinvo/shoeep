<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = Blog::all();


        return view('admin.blog.index',compact('blogs'));
    }

    public function show($id){
        $blogs = Blog::findOrFail($id);
        return view('admin');
    }

    public function create(){
        return view('admin.blog.create');
    }

    public function store(Request $request){
        Blog::create($request->all());

        return redirect('/admin/blog/index');
    }
}
