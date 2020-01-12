<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->
                    on('users')->onDelete('cascade');
            $table->uuid('cv_id');
            $table->foreign('cv_id')->references('id')->
                    on('cvs')->onDelete('cascade');
            $table->uuid('company_id');
            $table->foreign('company_id')->references('id')->on('company_informations')->onDelete('cascade');
            $table->uuid('job_position_id');
            $table->foreign('job_position_id')->references('id')->
                    on('job_positions')->onDelete('cascade');
            $table->string('apply_time');
            $table->boolean('has_interview')->default(0);
            $table->boolean('by_apply_this_cmp')->default(0);
            $table->uuid('staff_resource_id')->nullable();
            $table->foreign('staff_resource_id')->references('id')->
                    on('staff_resources')->onDelete('cascade');
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
        Schema::dropIfExists('applies');
    }
}
