<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFpReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fp_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fp_id')->unsigned();
            $table->foreign('fp_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('age');
            $table->integer('num_child');
            $table->date('lmp');
            $table->string('client_type',100);
            $table->string('method_accepted', 100);
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
        Schema::dropIfExists('fp_report');
    }
}
