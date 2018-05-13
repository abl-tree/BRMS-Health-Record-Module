<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpiReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epi_report', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('epi_id')->unsigned();
            $table->foreign('epi_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('age');
            $table->string('mother_name',100);
            $table->string('father_name',100);
            $table->string('fdg',100);
            $table->decimal('weight', 8,2);
            $table->string('r_code', 100);
            $table->string('vaccine',100);
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
        Schema::dropIfExists('epi_report');
    }
}
