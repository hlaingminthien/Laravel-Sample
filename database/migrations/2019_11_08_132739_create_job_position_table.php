<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_positions', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('job_code_id');
            $table->uuid('company_id');
            $table->foreign('company_id')->references('id')->on('company_informations')->onDelete('cascade');
            $table->uuid('jobcategory_id');
            $table->foreign('jobcategory_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->uuid('job_sub_category_id')->nullable();
            $table->foreign('job_sub_category_id')->references('id')->on('job_sub_categories')->onDelete('cascade');
            $table->string('position_name');
            $table->string('age')->nullable();
            $table->enum('gender',['male','female']);
            $table->uuid('exper_id');
            $table->integer('offer_employee_count');
            $table->foreign('exper_id')->references('id')->on('experience_levels')->onDelete('cascade');
            $table->mediumText('job_description');
            $table->mediumText('job_requirement');
            $table->integer('salary')->unsigned();
            $table->uuid('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->uuid('city_id')->nullable();
            $table->uuid('township_id')->nullable();
            $table->string('job_time');
            $table->mediumText('benefits');
            $table->mediumText('others');
            $table->dateTime('topping_time')->nullable();
            $table->dateTime('refresh_time')->nullable();
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
        Schema::dropIfExists('job_positions');
    }
}
