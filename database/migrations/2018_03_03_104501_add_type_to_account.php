<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // if(Schema::hasTable('account'))
        // Schema::table('account', function($table) {
        //     $table->rememberToken();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('account', function($table) {
        //     $table->dropColumn('remember_token');
        // });

    }
}
