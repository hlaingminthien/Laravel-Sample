<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_sub_categories', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('name');
            $table->uuid('job_category_id');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
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
        Schema::dropIfExists('job_sub_categories');
    }
}
