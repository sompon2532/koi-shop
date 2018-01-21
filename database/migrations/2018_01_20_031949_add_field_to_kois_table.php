<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToKoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kois', function (Blueprint $table) {
            $table->integer('store_id', false, true)->after('strain_id')->nullable();
            $table->integer('hall_of_fame_id', false, true)->after('strain_id')->nullable();
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
            $table->dropColumn('store_id');
            $table->dropColumn('hall_of_fame_id');
        });
    }
}
