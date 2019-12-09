<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('company_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('cp_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('detail')->nullable();
            $table->string('address')->nullable();
            $table->string('soi')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('map')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
           // $table->unique(['cp_id','locale']);
            $table->string('locale')->index();
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('company_translations');
    }
}
