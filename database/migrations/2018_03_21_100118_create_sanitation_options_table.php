<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanitationOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanitation_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option');
            $table->integer('sanitation_type_id')->unsigned();
            $table->foreign('sanitation_type_id')
                    ->references('id')
                    ->on('sanitation_types')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanitation_options');
    }
}
