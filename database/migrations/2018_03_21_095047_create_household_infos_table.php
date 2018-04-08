<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('household_infos', function (Blueprint $table) {          
        //     $table->increments('id');
        //     $table->integer('brgy_id');
        //     $table->foreign('brgy_id')
        //             ->references('id')
        //             ->on('barangay_info')
        //             ->onDelete('cascade');
        //     $table->integer('brgy_chairman_id');
        //     $table->foreign('brgy_chairman_id')
        //             ->references('id')
        //             ->on('barangay_workers')
        //             ->onDelete('cascade');
        //     $table->string('committee')->nullable();
        //     $table->integer('midwife_ndp_assigned');
        //     $table->foreign('midwife_ndp_assigned')
        //             ->references('id')
        //             ->on('barangay_workers')
        //             ->onDelete('cascade');
        //     $table->integer('purok_id');
        //     $table->foreign('purok_id')
        //             ->references('id')
        //             ->on('purok')
        //             ->onDelete('cascade');
        //     $table->date('date_profiled');
        //     $table->integer('interviewed_by');
        //     $table->foreign('interviewed_by')
        //             ->references('id')
        //             ->on('barangay_workers')
        //             ->onDelete('cascade');
        //     $table->enum('nhts',['yes', 'no'])->default('yes');
        //     $table->string('nhts_no')->nullable();
        //     $table->enum('ip',['yes', 'no'])->default('yes');
        //     $table->enum('cct',['yes', 'no'])->default('yes');
        //     $table->enum('non_nhts',['yes', 'no'])->default('yes');
        //     $table->string('tribe')->nullable();
        //     $table->string('philhealth_no')->nullable();
        //     $table->string('ip_no')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('household_infos');
    }
}
