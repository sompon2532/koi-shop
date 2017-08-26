<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('koi_id')->nullable()->index();
            $table->integer('farm_id', false, true);
            $table->integer('strain_id', false, true);
            $table->boolean('certificate')->default(true);
            $table->string('born')->nullable();
            $table->string('slug')->index()->nullable();
            $table->string('oyagoi')->nullable();
            $table->enum('sex', ['male', 'female', 'unknown']);
            $table->integer('owner', false, true)->nullable();
            $table->string('storage')->nullable();
            $table->float('price', 8, 2);
            $table->boolean('status')->default(true);
            $table->integer('category_id', false, true)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kois');
    }
}
