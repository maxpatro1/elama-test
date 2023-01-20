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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->integer('photo_id');
            $table->integer('owner_id')->comment('id оценщика фото');
            $table->integer('mark')->comment('оценка фото');
            $table->timestamps();


            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->foreign('photo_id')
                ->references('id')
                ->on('photos')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
};
