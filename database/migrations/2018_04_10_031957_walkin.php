<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Walkin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walkin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('walkin_id')->unsigned();
            $table->foreign('walkin_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('blood_pressure');
            $table->integer('blood_sugar');
            $table->string('consultation',255);
            $table->string('findings',255);
            $table->longText('notes');
            $table->string('medicine',255);
            $table->integer('med_quantity');
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
        Schema::dropIfExists('walkin');
    }
}
