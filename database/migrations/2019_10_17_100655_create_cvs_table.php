<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->
                    on('users')->onDelete('cascade');
            $table->uuid('staff_resource_id')->nullable();
            $table->foreign('staff_resource_id')->references('id')->
                    on('staff_resources')->onDelete('cascade');
            $table->string('job_position');
            $table->uuid('jobcate_id');
            $table->foreign('jobcate_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->uuid('experlevel_id');
            $table->foreign('experlevel_id')->references('id')->on('experience_levels')->onDelete('cascade');
            $table->uuid('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('expected_salary'); 
             $table->enum('employment_status',['Employed_but_open_for_opportunities','Employed_and_not_Open_for_opportunities','Actively_Looking']);
            $table->enum('employment_type',['Part_Time','Full_Time',
                ]);
            $table->string('education')->nullable();
            $table->enum('relative_at_company',['have','no'])->deault('no');
            $table->string('relation')->nullable();
            $table->string('realtive_team')->nullable();
            $table->string('realtive_job_position')->nullable();
            $table->string('realtive_contact')->nullable();
            $table->enum('bond_with_prev_company',['have','no']);
            $table->enum('limit_jobs_with_prev_company',['have','no']);
            $table->boolean('cv_correct')->default(0);

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
        Schema::dropIfExists('cvs');
    }
}
