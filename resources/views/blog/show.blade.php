@extends('layouts.app')

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
                <!-- <img src="{{asset('images/'.$post->image_path)}}"
                class="w-full"
                alt=""> -->
                <div
                    style="background-image: url('{{asset("images/".$post->image_path)}}');"
                    class="background-contain"
                ></div>
            </div>
            <div class="bg-white w-full p-20">
                <h2 class="text-4xl font-bold">{{$post->title}}</h2>
                <span>By <a href="" class="font-bold italic text-blue-500">{{$post->user->name}}</a>, Created on {{date('jS M Y', strtotime($post->updated_at))}}</span>

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