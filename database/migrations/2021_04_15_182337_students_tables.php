<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_students_table', function (Blueprint $table) {
            $table->id();
            $table->string('suID')->unique();
            $table->string('suEMAIL')->unique();
            $table->string('surNAME');
            $table->string('otherNAMES');
            $table->string('passportNUMBER');
            $table->string('Course');
            $table->string('Residence');
            $table->string('DOB');
            $table->string('Nationality');
            $table->string('dateofENTRY');
            $table->string('phoneNUMBER');
            $table->string('password');

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
