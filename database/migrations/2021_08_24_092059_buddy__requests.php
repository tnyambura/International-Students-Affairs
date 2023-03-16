<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuddyRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddies_Requests', function (Blueprint $table) {
            $table->id();
            $table->string('surNAME');
            $table->string('otherNAMES');
            $table->string('suID')->unique();
            $table->string('email')->unique();
            $table->string('course')->nullable();
            $table->string('YearOfStudy')->nullable();
            $table->string('PassportNumber')->nullable();
            $table->string('Nationality')->nullable();
            $table->string('Faculty')->nullable();
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
        //
    }
}
