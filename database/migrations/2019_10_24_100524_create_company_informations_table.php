<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_informations', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->uuid('company_name');
            $table->uuid('user_id')->unique();
            $table->foreign('user_id')->references('id')->
                    on('users')->onDelete('cascade');
            $table->uuid('staff_resource_id')->nullable();
            $table->foreign('staff_resource_id')->references('id')->
                    on('staff_resources')->onDelete('cascade');
            $table->uuid('job_category_id');
            $table->foreign('job_category_id')->references('id')->
                    on('job_categories')->onDelete('cascade');
            $table->uuid('man_power_id');
            $table->foreign('man_power_id')->references('id')->
                    on('man_power')->onDelete('cascade');
            $table->uuid('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->enum('company_type',['foreign','local']);
            $table->string('established_date');
            $table->string('facebook_link');
            $table->string('wechat_link');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('address');
            $table->string('what_you_do')->nullable();
            $table->string('why_should_join')->nullable();
            $table->string('logo')->nullable();
            $table->string('licensePhoto')->nullable();
            $table->boolean('company_correct')->default(0);
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
        Schema::dropIfExists('company_informations');
    }
}

