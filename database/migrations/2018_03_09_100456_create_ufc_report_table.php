<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUfcReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ufc_report', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('ufc_id')->unsigned();
            $table->foreign('ufc_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('age');
            $table->string('mother_name',100);
            $table->string('father_name',100);
            $table->string('fdg',100);
            $table->decimal('weight', 8,2);
            $table->string('r_code', 100);
            $table->longText('remarks');
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
        Schema::dropIfExists('ufc_report');
    }
}
