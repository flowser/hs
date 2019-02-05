<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');//edited or creted by
            $table->unsignedInteger('organisation_id')->nullable();
            $table->unsignedInteger('bureau_id')->nullable();
            $table->string('title', 120);
            $table->string('advert_image')->nullable();
            $table->string('advert_title', 120);
            $table->longText('advert_details')->nullable();


            $table->timestamps();

            $table->foreign('organisation_id')->references('id')->on('organisations')->onDelete('cascade');
            $table->foreign('bureau_id')->references('id')->on('bureaus')->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
}
