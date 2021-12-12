<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* here we create a new migration for a posts table */
        Schema::create('posts', function (Blueprint $table){
            /* in mysql these represent columns and their types */
            /* a few special exceptions are increments(id) which automatically take on the role of a primary key */
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->longText('description');
            $table->string('image_path');
            /* timestamps creates 2 columns, one for created_at and one at updated_at */
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            /* creates a foreign key that references the user by id */
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        
    }
}
