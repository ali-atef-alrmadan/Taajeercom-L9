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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("country_id");
            $table->unsignedBigInteger("city_id");
            $table->string("address_description");
            $table->timestamps();

            $table->foreign('country_id')->on('countries')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->on('cities')->references('id')
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
        Schema::dropIfExists('locations');
    }
};
