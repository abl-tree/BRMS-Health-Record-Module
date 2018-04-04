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
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('age');
            $table->date('birthdate');
            $table->enum('sex', ['male', 'female']);
            $table->string('birthplace')->nullable();
            $table->string('relationship')->default('yes');
            $table->enum('family_head', [1, 0])->nullable();
            $table->string('civil_status')->nullable();
            $table->string('educ_attainment')->nullable();
            $table->string('occupation')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('philhealth_expiration')->nullable();
            $table->string('health_status')->nullable();
            $table->string('fp_method')->nullable();
            $table->string('pregnant')->nullable();
            $table->string('nut_status')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('fic')->nullable();
            $table->string('training')->nullable();
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
