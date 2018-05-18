<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBipReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bip_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bip_id')->unsigned();
            $table->foreign('bip_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('age');
            $table->string('BP',100);
            $table->string('client_type',100);
            $table->longText('f_history');
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
        Schema::dropIfExists('bip_report');
    }
}
