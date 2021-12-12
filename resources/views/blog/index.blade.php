@extends('layouts.app')
<!-- 
    this is the main page for all blog posts
    first thing we want to do is to check if the user is signed in
    if he is is, then we show the "Create post" button so he can start posting stuff
    further down, we take the data passed down from the controller and run a quick php foreach loop to create posts with the data
    to load data for each post's properties we use {{$post->whatever-the-name-is}}
 -->
@section('content')

<div class="w-4/5 m-auto">
    <header class="flex justify-between mt-24"> 
        <h1 class="text-6xl font-bold">Blog posts</h1>
        @if(Auth::check())
                <a
                href="/blog/create"
                class="inline-block bg-blue-500 text-white font-bold rounded-full py-4 px-8"
                >Create post</a>
        @endif
    </header>
    @if(session()->has('message'))
        <div class="w-full bg-green-100 text-green-500 font-bold p-4  mt-24">
            {{session()->get('message')}}
        </div>
    @endif
    <main>
        <?php foreach($posts as $post) : ?>
        <article class="flex my-24">
            <div class="w-full">
                <div
                    style="background-image: url('{{asset("images/".$post->image_path)}}');"
                    class="background-contain"
                ></div>
            </div>
            <div class="bg-white w-full p-20">
                <div>
                    <div class="flex justify-between">
                        <h2 class="text-4xl font-bold">{{$post->title}}</h2>
                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                        <div>
                            <span>
                                <a
                                class="text-blue-500 font-bold" 
                                href="/blog/{{$post->slug}}/edit">Edit</a>
                            </span>
                            <span>
                                <form action="/blog/{{$post->slug}}" method="post">
                                    @csrf
                                    @method('delete')
                                    
                                    <button class="text-red-500 font-bold" type="submit">Delete</button>
                                </form>
                            </span>
                        </div>
                        @endif
                    </div>
                    <span>By <a href="" class="font-bold italic text-blue-500">{{$post->user->name}}</a>, Created on {{date('jS M Y', strtotime($post->updated_at))}}</span>
                </div>

                <p class="text-xl font-light py-8">
                    {{$post->description}}
                </p>
                
                <a href="/blog/{{$post->slug}}"
                class="inline-block bg-blue-500 text-white font-bold py-4 px-8 rounded-full">Keep reading</a>
            </div>
        </article>
        <?php endforeach ?>
    </main>
</div>

@endsection