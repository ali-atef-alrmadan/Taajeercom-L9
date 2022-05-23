<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("vehicles_id");
            $table->unsignedBigInteger("location_id");
            $table->dateTime("start date");
            $table->dateTime("end date");
            $table->timestamps();


            $table->foreign('user_id')->on('users')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('vehicles_id')->on('vehicles')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('location_id')->on('locations')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
