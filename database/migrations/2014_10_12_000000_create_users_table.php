<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();    
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');

            // Szállítási adatok
            $table->string('zip');
            $table->string('city');
            $table->string('street');
            $table->string('houseNumber');
            $table->string('floor_door')->nullable(); // nem kötelező
            $table->string('doorbell')->nullable();  // nem kötelező
            $table->string('elseData')->nullable();  // nem kötelező

            $table->boolean('accepted_terms');

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
