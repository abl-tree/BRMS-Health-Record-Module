<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsForPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persons', function (Blueprint $table) {
           $table->string('street')->nullable();
		   $table->string('purok')->nullable();
		   $table->string('barangay')->nullable();
		   $table->string('city')->nullable();
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
            $table->dropColumn('street');
            $table->dropColumn('purok');
            $table->dropColumn('barangay');
            $table->dropColumn('city');
        });
    }
}
