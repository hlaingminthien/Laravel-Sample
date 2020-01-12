<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInformationsCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_informations_cvs', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('company_id');
            $table->uuid('cv_id');
            $table->foreign('company_id')->references('id')->on('company_informations')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cv_id')->references('id')
            ->on('cvs')->onUpdate('cascade')
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
        Schema::dropIfExists('company_informations_cvs');
    }
}
