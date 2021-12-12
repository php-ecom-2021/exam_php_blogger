@extends('layouts.app')
<!-- 
    this is what extends the / page technically
    it has some static data that lets the user roam to other parts of the site such as register and also a preview of recent posts
    only dynamic data we actually get is under recent posts where we will get up to 4 existing latest posts
    the number of received post is defined under the index method in the controller by simply using the limmit method with a value of 4
 -->
@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-white">
            <div class="m-auto sm:m-auto w-4/5 block text-center">
                <h1 class="text-8xl font-bold mb-8">Welcome to <span class="text-blue-500">Blogger!</span></h1>
                <a class="inline-block text-center bg-blue-500 font-bold py-4 px-8 rounded-full" href="/blog">Discover</a>
            </div>
        </div>
    </div>
    <section class="sm:grid grid-cols-2 gap-20 w-4/5 my-24 m-auto">
        <div>
            <img src="https://images.pexels.com/photos/708392/pexels-photo-708392.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
            class="w-full"
            alt="">
        </div>
        <div class="self-center">
            <h2 class="text-6xl font-bold pb-8">Having trouble connecting?</h2>
            <p class="w-3/5 pb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit totam tenetur odio aspernatur quod, laborum ab praesentium aliquid. Excepturi aperiam sunt amet unde ab debitis nostrum neque at harum deleniti?</p>
            @if(auth()->user())
            <a href="/blog"
            class="inline-block bg-blue-500 text-white font-bold py-4 px-8 rounded-full">Start connecting today!</a>
            @else
            <a href="/register"
            class="inline-block bg-blue-500 text-white font-bold py-4 px-8 rounded-full">Start connecting today!</a>
            @endif
        </div>
    </section>
    <section class="text-center bg-white py-16">
        <h2 class="text-2xl pb-8">If you want to...</h2>
        <ul>
            <li class="font-bold text-4xl p-2 text-blue-600">Make new friends</li>
            <li class="font-bold text-4xl p-2 text-blue-600">Join fun activities</li>
            <li class="font-bold text-4xl p-2 text-blue-600">Discuss interesting topics</li>
            <li class="font-bold text-4xl p-2 text-blue-600">Be the center of attention</li>
        </ul>
    </section>
    <section class="w-4/5 m-auto py-24">
        <h2 class="text-6xl font-bold pb-16">Blog</h2>
        <h3 class="text-4xl font-bold pb-8">Recent posts</h3>
        <div class="sm:grid grid-cols-2 gap-10">
        
        <?php foreach($posts as $post) : ?>

            <article class="flex">
                <div class="w-full ">
                    <div
                    style="background-image: url('{{asset("images/".$post->image_path)}}');"
                    class="background-cover"
                    >
                </div>
                    
                </div>
                <div class="w-full p-4 bg-white flex flex-col">
                    <h4 class="text-2xl font-bold mb-2">{{$post->title}}</h4>
                    <p>{{$post->description}}</p>
                    <a
                    class="inline-block py-2 px-4 bg-blue-500 text-white rounded-full self-end mt-auto "
                    href="/blog/{{$post->slug}}">View</a>
                </div>
            </article>
            
        <?php endforeach ?>

        </div>
    </section>
@endsection