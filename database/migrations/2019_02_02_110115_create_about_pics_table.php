<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_pics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');//edited or creted by
            $table->unsignedInteger('about_id');
            $table->string('about_image1')->nullable();
            $table->string('about_image2')->nullable();
            $table->string('about_image3')->nullable();
            $table->string('about_image4')->nullable();
            $table->string('about_image5')->nullable();
            $table->string('about_image6')->nullable();
            $table->timestamps();

            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_pics');
    }
}
