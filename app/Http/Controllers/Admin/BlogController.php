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

    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit',compact('blog'));
    }
    public function update(Request $request){
        $blog = Blog::find($request->id);

        if($request->file('image')){
            $im = $request->file('image')->store('api/files','public');
            $image = asset('storage/'.$im);
        }else{
            $image = $blog->image;
        }


        $blog->update([
            'title_ar' => $request->title_ar,
            'title_du'=> $request->title_du,
            'description_ar'=> $request->description_ar,
            'description_du'=> $request->description_du,
            'image' => $image,

        ]);
        return redirect('/admin/blog/edit/'. $request->id);
    }

    public function create(){
        return view('admin.blog.create');
    }

    public function store(Request $request){
        $image = $request->file('image')->store('api/files','public');
        Blog::create([
            'title_ar' => $request->title_ar,
            'title_du'=> $request->title_du,
            'description_ar'=> $request->description_ar,
            'description_du'=> $request->description_du,
            'image' => asset('storage/'.$image),

        ]);

        return redirect('/admin/blog/index');
    }


    public function destroy($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('/admin/blog/index');
    }
}
