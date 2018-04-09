<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('households', function (Blueprint $table) {
             $table->increments('id');
             $table->string('district');
             $table->string('province');
             $table->integer('encoder');
             $table->foreign('encoder')
                     ->references('id')
                     ->on('account');
             $table->integer('household_info_id')->unsigned();
             $table->foreign('household_info_id')
                     ->references('id')
                     ->on('household_infos')
                     ->onDelete('cascade');
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
         Schema::dropIfExists('households');
    }
}
