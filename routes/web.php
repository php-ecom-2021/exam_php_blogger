<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
We haven't really made much use of the routing but with a little refactoring of the controller and separating the views and what they receive or send
Most usefull things would be in-a-way the modularity it offers and separation but also the naming convention how you can name a route and then refer to it in other placce, e.g. forms, a, etc
*/

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();