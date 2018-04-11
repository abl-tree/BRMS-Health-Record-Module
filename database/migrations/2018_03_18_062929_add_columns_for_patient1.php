<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsForPatient1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('persons', function (Blueprint $table) {
            $table->string('inname')->nullable();
		    $table->string('contact')->nullable();
		    $table->string('relationship')->nullable();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('persons', function (Blueprint $table) {
               $table->dropColumn('inname');
               $table->dropColumn('contact');
               $table->dropColumn('relationship');
         });
    }
}
