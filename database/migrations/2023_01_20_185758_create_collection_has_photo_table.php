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
        Schema::create('collection_has_photos', function (Blueprint $table) {
            $table->id();
            $table->integer('photo_id');
            $table->integer('collection_id');
            $table->timestamps();


            $table->foreign('collection_id')
                ->references('id')
                ->on('collections')
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
        Schema::dropIfExists('collection_has_photos');
    }
};
