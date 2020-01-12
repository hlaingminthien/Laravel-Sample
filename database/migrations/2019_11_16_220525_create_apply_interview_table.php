<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_interview', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('apply_id');
            $table->uuid('interview_id');
            $table->foreign('apply_id')->references('id')->on('applies')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('interview_id')->references('id')->on('interviews')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('interview_mark')->nullable();
            $table->set('interview_result',['pass','fail'])->nullable();
            $table->boolean('finish')->default(0);
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
        Schema::dropIfExists('apply_interview');
    }
}
