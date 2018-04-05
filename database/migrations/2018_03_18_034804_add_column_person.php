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
             $table->decimal('height', 8, 2)->nullable();
             $table->decimal('weight', 8, 2)->nullable();
             $table->string('blood_type')->nullable();
             $table->string('contact_number')->nullable();
             $table->string('email')->nullable();
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
             
        });
    }
}
