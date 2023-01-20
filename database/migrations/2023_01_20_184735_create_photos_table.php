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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Название фото');
            $table->integer('appraiser_id')->comment('id владельца фото');
            $table->double('average_mark')->comment('средняя оценка фото');
            $table->string('location')->nullable()->comment('Местоположение');
            $table->string('url')->comment('Url для получения фото');
            $table->timestamps();

            $table->foreign('appraiser_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('photos');
    }
};
