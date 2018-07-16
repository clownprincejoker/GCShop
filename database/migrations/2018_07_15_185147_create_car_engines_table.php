<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_engines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('deatil');
            $table->enum('engine_type', array('Petrol', 'Diesel'));
            $table->integer('image')->unsigned()->nullable();
            $table->foreign('image')->references('id')->on('images')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_engines');
    }
}
