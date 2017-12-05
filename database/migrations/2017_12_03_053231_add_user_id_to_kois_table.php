<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToKoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kois', function (Blueprint $table) {
            $table->dropColumn('owner');
            $table->integer('user_id', false, true)->after('sex')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kois', function (Blueprint $table) {
            $table->integer('owner', false, true)->after('sex')->nullable();
            $table->dropColumn('user_id');
        });
    }
}
