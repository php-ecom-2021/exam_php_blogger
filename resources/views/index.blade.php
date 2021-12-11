@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-white">
            <div class="m-auto sm:m-auto w-4/5 block text-center">
                <h1 class="text-8xl font-bold mb-8">Welcome to <span class="text-blue-500">Blogger!</span></h1>
                <a class="inline-block text-center bg-blue-500 font-bold py-4 px-8 rounded-full" href="/">Discover</a>
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
            <a href=""
            class="inline-block bg-blue-500 text-white font-bold py-4 px-8 rounded-full">Start connecting today!</a>
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
            <article class="flex">
                <div class="w-full ">
                    <div
                    style="background-image: url('https://images.pexels.com/photos/1837591/pexels-photo-1837591.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');"
                    class="background-cover"
                    >
                </div>
                    
                </div>
                <div class="w-full p-4 bg-white flex flex-col">
                    <h4 class="text-2xl font-bold mb-2">Post title</h4>
                    <p>Post description will go here. Hopefully something short...</p>
                    <a
                    class="inline-block py-2 px-4 bg-blue-500 text-white rounded-full self-start mt-auto "
                    href="">View</a>
                </div>
            </article>
            
        </div>
    </section>
@endsection