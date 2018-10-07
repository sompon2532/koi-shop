<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('seq');
            $table->string('url')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('menus')->insert(['name' => 'KOI', 'seq' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'KOI PRODUCT', 'seq' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'EVENT', 'seq' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'ONLINE AUCTION', 'seq' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'FACEBOOK', 'seq' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'INSTAGRAM', 'seq' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'LINE@', 'seq' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'CONTACT US', 'seq' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'HALL OF FAME', 'seq' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'ABOUT US', 'seq' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'NEWS', 'seq' => 11, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('menus')->insert(['name' => 'PAYMENT', 'seq' => 12, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
