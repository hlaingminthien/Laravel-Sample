<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('name');
            $table->uuid('company_id');
            $table->foreign('company_id')->references('id')->on('company_informations')->onDelete('cascade');
            $table->string('date');
            $table->string('time');
            $table->string('location');
            $table->mediumText('interview_requirement');
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
        Schema::dropIfExists('interview_infos');
    }
}
