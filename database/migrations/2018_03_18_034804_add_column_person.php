<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('persons', function (Blueprint $table) {
              $table->decimal('height', 8, 2);
              $table->decimal('weight', 8, 2);
              $table->string('blood_type');
              $table->string('contact_number');
              $table->string('email');
              $table->timestamp('updated_at');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('persons', function($table) {
              $table->dropColumn('height');
              $table->dropColumn('weight');
              $table->dropColumn('blood_type');
              $table->dropColumn('contact_number');
              $table->dropColumn('email');
              $table->dropColumn('updated_at');
         });
    }
}
