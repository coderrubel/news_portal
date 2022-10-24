<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('sub_category_id');
            $table->string('post_title');
            $table->text('post_detail');
            $table->integer('visitors')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('is_share')->nullable();
            $table->integer('is_comment')->nullable();
            $table->timestamps();
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
