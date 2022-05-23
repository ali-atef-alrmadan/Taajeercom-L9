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
        Schema::create('offcesworkers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("office_id");
            $table->integer("Salary");
            $table->timestamps();
            $table->foreign('user_id')->on('users')->references('id')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('office_id')->on('offices')->references('id')
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
        Schema::dropIfExists('offcesworkers');
    }
};
