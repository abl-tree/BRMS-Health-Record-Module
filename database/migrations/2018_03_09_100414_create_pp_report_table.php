<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pp_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pp_id')->unsigned();
            $table->foreign('pp_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('age');
            $table->string('PlaceofDelivery',100);
            $table->string('attended_by',100);
            $table->string('gender',100);
            $table->string('fdg',100);
            $table->decimal('weight', 8,2);
            $table->date('date_of_pp');
            $table->date('vitamina');
            $table->date('dod');
            $table->string('F',100);
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
        Schema::dropIfExists('pp_report');
    }
}
