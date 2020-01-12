<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('cv_id');
            $table->foreign('cv_id')->references('id')->
                    on('cvs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('relation');
            $table->string('job_position');
            $table->string('religious');
            $table->string('position');
            $table->string('job_description')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('family_members');
    }
}
