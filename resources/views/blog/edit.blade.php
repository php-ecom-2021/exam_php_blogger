@extends('layouts.app')
<!-- 
    the edit is used when a user wants to edit a post of his own
    first we setup where the form should go, method and enctype
    then we set up the @csrf and we have to "fake" the method we are gonna use by using @method('put') since a form only allows get and post
    then we load the input field with the old post values so we know what the old/current version of the post is
    we change whatever we change and when submitted, the post will be updated with the new data thanks to the controller
 -->
@section('content')

<div class="w-4/5 m-auto">
    <header class="between my-24">
        <h1 class="text-6xl font-bold">Update post</h1>
    </header>
    <main>
        <form action="/blog/{{$post->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{$post->title}}" class="block w-full bg-gray-200 h-20 outline-none text-4xl border-b-2 border-b-blue-500 p-8 @error('title')border-b-red-500 @enderror">
            @error('title')
            <div class="text-red-500 text-sm">
            {{$message}}
            </div>
            @enderror
            <div class="sm:grid grid-cols-2 gap-20 my-8">
                <div>
                    <textarea name="description" id="description" placeholder="Description..." class="p-8 bg-gray-200 block border-b-2 border-b-blue-500 w-full text-xl outline-none @error('description')border-b-red-500 @enderror">{{$post->description}}</textarea>

                    @error('description')
                    <div class="text-red-500 mb-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>


                <div>
                    <label class="block p-4 bg-blue-100 w-min text-center m-auto border-b-2 border-b-blue-500 @error('image') border-b-red-500 @enderror">
                        Add image to your post
                        <input type="file" name="image" accept="image/*" class="hidden">
                    </label>

                    @error('image')
                    <div class="text-red-500 mb-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="block ml-auto bg-blue-500 text-white font-bold py-4 px-8 rounded-full">Post</button>
        </form>
    </main>
</div>

@endsection