<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_offers', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('apply_id');
            $table->uuid('user_id');
            $table->uuid('company_id');
            $table->foreign('company_id')->references('id')->on('company_informations')->onDelete('cascade');
            $table->uuid('job_position_id');
            $table->foreign('job_position_id')->references('id')->on('job_positions')->onDelete('cascade');
            $table->string('start_date');
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
        Schema::dropIfExists('company_offers');
    }
}
