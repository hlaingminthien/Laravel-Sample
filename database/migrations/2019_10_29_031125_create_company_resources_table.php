<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_resources', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('company_id');
            $table->foreign('company_id')->references('id')->on('company_informations')->onDelete('cascade');
            $table->uuid('card_id');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->integer('used_postion')->default(0)->nullable();
            $table->integer('used_refresh')->default(0)->nullable();
            $table->integer('used_topping')->default(0)->nullable();
            $table->integer('used_advice')->default(0)->nullable();
            $table->integer('used_cv')->default(0)->nullable();
            $table->integer('used_time')->unsigned();
            $table->string('checkby');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_resources');
    }
}
