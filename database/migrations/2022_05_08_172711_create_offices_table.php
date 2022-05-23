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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("admin_id");
            $table->unsignedBigInteger("location_id");
            $table->string("name");
            $table->string("phone_number");
            $table->string("description",2500);
            $table->boolean("status")->default(0);
            $table->timestamps();

            $table->foreign('admin_id')->on('users')->references('id')
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
        Schema::dropIfExists('offices');
    }
};
