<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuddiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddies', function (Blueprint $table) {
            $table->id();
            $table->string('surNAME');
            $table->string('otherNAMES');
            $table->string('suID')->unique();
            $table->string('email')->unique();  
            $table->string('Residence')->unique();                   
                     
            $table->string('course')->nullable();
            $table->string('PassportNUMBER')->nullable();
            $table->string('phoneNUMBER')->nullable();
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
