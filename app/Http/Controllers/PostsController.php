<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        /* here we state that all methods under this controller are only accessible by authenticated user EXCEPT the index and show method */
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        /* Under this method we first take all posts */
        $posts = Post::orderBy('updated_at', 'DESC')->limit(4)->get();
        /* Then we return a view and pass the $posts variable to the view as well */
        return view('blog.index',[
            'posts' => $posts
        ]);
    }

    public function create()
    {
        /* This method works only if the user is logged in. It returns a view where the user can create a new post*/
        return view('blog.create');
    }

    public function store(Request $request)
    {
        /* First we take in the request and passing it down */
        /* Next we validate the data in the request, checking if it is required, type, size, etc. */
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
        ]);
        /* !!! Since an image is set to required, if there is no image, the rest of the funciton wont be executed */
        /* After the validation, we take the original name of the image and its extension with getClientOriginalName() method*/
        $imageName = $request->file('image')->getClientOriginalName();
        /* Then we create a new unique name for the image to stored by using the time method and concatinating it with the original name */
        $newImageName = time().'_'.$imageName;
        /* After all these are done, we take the image and we store/move it to the public/images folder saved with the new name */
        $request->image->move(public_path('images'), $newImageName);
        /* To identify and access our posts we will create a slug, for which we will create a simple sluggable function inside the method which will copy and convert the title into a slug */
        $slug = Post::sluggable($request->title);
        /* After validation has been passed and the image has been stored under public, we will store the information in the database */
        /* Keep in mind that in here we wont be storing the image itself in the db, but only the new name we have given it earlier */
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $slug,
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);
        /* After all the steps have been passed successfully, we will redirect to /blog with a message to notify the user that a post has been uploaded */
        return redirect('/blog')->with('message', 'Your post has been successfully uploaded!');
    }

    public function show($slug)
    {
        /* with the show method, we want to allow a user to be able to see a singular post */
        return view('blog.show')
        /* thats why we append a with() method with the return of a view, so we can send a post back that matches the slug */
        /* to get the desired post, we create a query with WHERE statement and return the first record that matches slug = $slug */
        ->with('post', Post::where('slug', $slug)->first());
    }

    public function edit($slug)
    {
        /* to edit, we first take the desired post and we push it down as a variable down to a blog.edit view where we will set the value of the input fields with the original post data */
        return view('blog.edit')
        ->with('post', Post::where('slug', $slug)->first());
        /* Next to actually update the post we will create a separate method called update */
    }

    public function update(Request $request, $slug)
    {
        /* under update, we will basically recreate the create method */
        /* we will first validate the data */
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        /* then we update the already existing post with the new data */
        Post::where('slug', $slug)
        ->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $slug,
            'user_id' => auth()->user()->id
        ]);
        /* when the data has been updated in the db, we redirect the user to the /blog page and put some feedback that their action was successul */
        return redirect('/blog')
        ->with('message', 'Your post has been updated');
    }

    public function destroy($slug)
    {
        /* under the destroy method we will make the logic for deleting a post which is quite simple */
        /* we first take the slug */
        /* find the desired post in the db querying by the slug and save it in a var */
        $post = Post::where('slug', $slug);
        /* use the delete method on the post */
        $post->delete();
        /* redirect to the /blog page with a message about the user action */
        return redirect('/blog')
        ->with('message', 'Your post has been deleted');
    }
}
