<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_experiences', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->
                    on('users')->onDelete('cascade');
            $table->uuid('cv_id');
            $table->foreign('cv_id')->references('id')->
                    on('cvs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('job_postion');
            $table->uuid('jobcate_id');
            $table->foreign('jobcate_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->uuid('experlevel_id');
            $table->foreign('experlevel_id')->references('id')->on('experience_levels')->onDelete('cascade');
            $table->string('star_date')->nullable();
            $table->string('end_date')->nullable();
            $table->text('left_reason')->nullable();
            $table->string('proof')->nullable();
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
        Schema::dropIfExists('work_experiences');
    }
}
