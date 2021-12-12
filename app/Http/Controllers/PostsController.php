<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return view('blog.index',[
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
        ]);

        $imageName = $request->file('image')->getClientOriginalName();
        $newImageName = time().'_'.$imageName;

        $request->image->move(public_path('images'), $newImageName);

        $slug = Post::sluggable($request->title);
        
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $slug,
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been successfully uploaded!');
    }

    public function show($slug)
    {
        return view('blog.show')
        ->with('post', Post::where('slug', $slug)->first());
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
