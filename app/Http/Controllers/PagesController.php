<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $posts = Post::orderBy('updated_at', 'DESC')->get(); /* Take all posts through the Post model queried by updated date */

        return view('index', [
            'posts' => $posts                                /* Returning view index and also passing the posts to the view */
        ]);
    }
}
