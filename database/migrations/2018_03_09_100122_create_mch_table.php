<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mch_id')->unsigned();
            $table->foreign('mch_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('age');
            $table->string('g',100);
            $table->string('p',100);
            $table->string('rcode',100);
            $table->string('level',100);
            $table->string('range',100);
            $table->date('lmp');
            $table->date('edc');
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
        Schema::dropIfExists('mch');
    }
}
