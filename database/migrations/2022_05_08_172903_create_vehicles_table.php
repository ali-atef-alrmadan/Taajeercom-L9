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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("owner_id");
            $table->unsignedBigInteger("brand_id");
            $table->unsignedBigInteger("type_id");
            $table->string("model");
            $table->date("year");
            $table->string("color");
            $table->string("capacity");
            $table->string("license_number");
            $table->integer("price");
            $table->string("description",2500);
            $table->string("available")->default("Available");
            $table->string("picture_path");
            $table->timestamps();

            $table->foreign('owner_id')->on('offices')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('brand_id')->on('vehiclebrands')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('type_id')->on('vehicletypes')->references('id')
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
        Schema::dropIfExists('vehicles');
    }
};
