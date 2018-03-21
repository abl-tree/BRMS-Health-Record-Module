<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanitationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanitation_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sanitation_opt_id')->unsigned();
            $table->foreign('sanitation_opt_id')
                    ->references('id')
                    ->on('sanitation_options')
                    ->onDelete('cascade');
            $table->enum('score', [1, 0]);
            $table->string('others');
            $table->integer('household_id')->unsigned();
            $table->foreign('household_id')
                    ->references('id')
                    ->on('households')
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
        Schema::dropIfExists('sanitation_statuses');
    }
}
