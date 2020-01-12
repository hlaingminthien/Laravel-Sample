<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewNotisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_notis', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->
                    on('users')->onDelete('cascade');
            $table->uuid('apply_id');
            $table->foreign('apply_id')->references('id')->
                    on('applies')->onDelete('cascade');
            $table->uuid('interview_id');
            $table->foreign('interview_id')->references('id')->
                    on('interviews')->onUpdate('cascade')->onDelete('cascade');
            $table->string('company_name');
            $table->string('position_name');
            $table->string('interview_name');
            $table->boolean('read')->default(0);
            $table->string('company_logo')->nullable();
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
        Schema::dropIfExists('interview_notis');
    }
}
