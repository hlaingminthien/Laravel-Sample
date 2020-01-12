<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {

            $table->uuid('id')->unique()->primary();
            $table->string('card_name')->unique();
            $table->integer('num_of_postion')->unsigned()->nullable()->default(0);
            $table->integer('num_of_refresh')->unsigned()->nullable()->default(0);
            $table->integer('num_of_topping')->unsigned()->nullable()->default(0);
            $table->integer('num_of_advice')->unsigned()->nullable()->default(0);
            $table->integer('num_of_cv')->unsigned()->nullable()->default(0);
            $table->integer('staff_advice_hour')->unsigned()->nullable()->default(0);
            $table->integer('training_hour')->unsigned()->nullable()->default(0);
            $table->integer('num_of_drawing_rules')->unsigned()->nullable()->default(0);
            $table->integer('limit_time')->unsigned()->default(0);
            $table->integer('price')->unsigned();
            $table->boolean('star_levels')->default(0);
            $table->boolean('hr_informations')->default(0);
            $table->boolean('staff_situation')->default(0);
            $table->text('details')->nullable();
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
        Schema::dropIfExists('cards');
    }
}
