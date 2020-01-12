<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('name');
            $table->uuid('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->uuid('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique();
            $table->string('photo')->nullable();
            $table->string('nrc')->nullable();
            $table->set('gender',['male','female'])->default('male');
            $table->string('race')->nullable();
            $table->string('religious')->nullable();
            $table->string('native_town')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->set('marital_status',['have_marriage','no_marriage','divorce'])->default('no_marriage');
            $table->string('health')->nullable();
            $table->string('address')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->string('relation_with_econtact')->nullable();
            $table->string('password');
            $table->boolean('active')->default(0);
            $table->boolean('terms_&_conditions');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
