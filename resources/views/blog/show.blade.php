@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto">
    <header class="between my-24">
        <h1 class="text-6xl font-bold mb-2">{{$post->title}}</h1>
        <author>By <span class="font-bold italic text-blue-500">{{$post->user->name}}</span>, created on {{date('jS M Y', strtotime($post->updated_at))}}</author>
    </header>
    <main>
        <article>
            <div>
            <div
                style="background-image: url('{{asset("images/".$post->image_path)}}');"
                class="background-contain">
            </div>
            </div>
            <div>
                <p>{{$post->description}}</p>
            </div>
        </article>
    </main>
</div>

@endsection