<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddNewStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_new_students', function (Blueprint $table) {
            $table->id();
            $table->string('suID')->unique();
            $table->string('suEMAIL')->unique();
            $table->string('surNAME');
            $table->string('firstNAME');
            $table->string('lastNAME');
            $table->string('Faculty');
            $table->string('Nationality');
            $table->string('Course');
            $table->string('Residence');
            $table->string('phoneNUMBER');
            $table->string('passportNUMBER');
            $table->string('ParentNames');
            $table->string('ParentEmail');
            $table->string('ParentPhone');




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
        Schema::dropIfExists('add_new_students');
    }
}
