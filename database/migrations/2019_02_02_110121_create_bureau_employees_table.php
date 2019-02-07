<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBureauEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureau_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('bureau_id');
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('gender_id');
            $table->string('photo')->nullable();
            $table->tinyInteger('active')->default(1)->unsigned();

            $table->string('id_no', 120);
            $table->string('id_photo_front', 120);
            $table->string('id_photo_back', 120);
            $table->longText('about_me')->nullable();
            $table->string('phone')->nullable();
            $table->string('landline')->nullable();
            $table->string('address', 120);

            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('county_id')->unsigned()->nullable();
            $table->integer('town_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bureau_id')->references('id')->on('bureaus')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
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
        Schema::dropIfExists('bureau_employees');
    }
}
