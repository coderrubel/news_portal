<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcatagory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcatagory', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('sub_category_name');
            $table->string('show_on_menu')->nullable();
            $table->integer('sub_catagory_order')->nullable();
            $table->SoftDeletes();
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
        Schema::dropIfExists('subcatagory');
    }
}
