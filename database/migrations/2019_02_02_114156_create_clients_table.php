<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('id_no', 120)->nullable();
            $table->string('id_photo_front', 120)->nullable();
            $table->string('id_photo_back', 120)->nullable();
            $table->tinyInteger('active')->default(1)->unsigned();
            $table->tinyInteger('hiringstatus')->default(0)->unsigned();
            $table->string('address', 120)->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('county_id')->unsigned()->nullable();
            $table->integer('constituency_id')->unsigned()->nullable();
            $table->integer('ward_id')->unsigned()->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('constituency_id')->references('id')->on('constituencies')->onDelete('cascade');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
