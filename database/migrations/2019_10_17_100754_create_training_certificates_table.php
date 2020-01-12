<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('training_certificates', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('cv_id');
            $table->foreign('cv_id')->references('id')->
                    on('cvs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('university');
            $table->enum('time_limit',['full','part']);
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('training_certificates');
    }
}
