<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Model extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_number')->unique();
            $table->integer('manufacturer_id');
            $table->string('colour');
            $table->string('year');
            $table->string('register_no');
            $table->string('note');
            $table->string('quantity');
            $table->string('photo_1');
            $table->string('photo_2');
            $table->timestamps();
            //$table->foreign('manufacturer_id')->references('id')->on('manufacturer');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model');
    }
}
