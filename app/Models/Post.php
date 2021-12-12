<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /* under fillable, we define which columns are to be filled in the db */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'user_id'
    ];
    /* here we define the relationship that a post has with user. So a post belongs to a user */
    public function user(){
        return $this->belongsTo(
            User::class
        );
    }

    public static function sluggable($title){
        /* quick function to create a slug for the slug column in the post table */
        /* we first take in a string and set it all to lower character */
        $lower = strtolower($title);
        /* tehn we start creating the slug where we first define a regex so everywhere that there is a space to replace with - and then pass the string we wish to be transformed */
        $slug = preg_replace("/[^A-Za-z0-9-]+/", '-', $lower);
        /* after the slug has been created its being returned so it can be used as a value in the PostController */
        return $slug;
    }
}
