<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSympReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_symp_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tb_id')->unsigned();
            $table->foreign('tb_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('age');
            $table->date('DOX_ray');
            $table->date('date_first');
            $table->string('sputum',255);
            $table->string('submit3',255);
            $table->date('date_first2');
            $table->string('sputum2',255);
            $table->string('result3',255);
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
        Schema::dropIfExists('tb_symp_report');
    }
}
