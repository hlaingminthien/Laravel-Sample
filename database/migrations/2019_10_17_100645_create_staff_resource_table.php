<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_resources', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->
                    on('users')->onDelete('cascade');
            $table->integer('offered_employer')->nullable();
            $table->integer('offered_employee')->nullable();
            $table->integer('used_cv')->nullable();
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
        Schema::dropIfExists('staff_resources');
    }
}
