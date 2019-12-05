<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('company',function(Blueprint $table){
            $table->increments('cp_id');
            $table->string('company_name_th')->nullable();
            $table->string('company_name_en')->nullable();
            $table->string('company_desc_th')->nullable();
            $table->string('company_desc_en')->nullable();
            $table->string('video')->nullable();
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
        Schema::drop('company');
    }
}

