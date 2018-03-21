<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')
                    ->references('id')
                    ->on('persons')
                    ->onDelete('cascade');
            $table->integer('household_id')->unsigned();
            $table->foreign('household_id')
                    ->references('id')
                    ->on('households')
                    ->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('relationship');
            $table->enum('family_head', [1, 0]);
            $table->string('civil_status');
            $table->string('educ_attainment');
            $table->string('occupation');
            $table->string('philhealth_no');
            $table->string('philhealth_expiration');
            $table->string('health_status');
            $table->string('fp_method');
            $table->string('pregnant');
            $table->string('nut_status');
            $table->string('height');
            $table->string('weight');
            $table->string('fic');
            $table->string('training');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('household_members');
    }
}
