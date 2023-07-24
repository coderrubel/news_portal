<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('gender');
            $table->string('division');
            $table->string('district');
            $table->string('specialist');
            $table->text('degree');
            $table->text('designation');
            $table->text('hospital');
            $table->string('bmdc')->nullable();
            $table->string('mobile1');
            $table->string('mobile2')->nullable();
            $table->text('chamber');
            $table->text('description')->nullable();
            $table->text('email')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
