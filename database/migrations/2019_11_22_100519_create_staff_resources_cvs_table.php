<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffResourcesCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_resources_cvs', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('staff_resource_id')->nullable();
            $table->foreign('staff_resource_id')->references('id')->on('staff_resources')->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->uuid('cv_id');
            $table->foreign('cv_id')->references('id')->on('cvs')->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('staff_resources_cvs');
    }
}
