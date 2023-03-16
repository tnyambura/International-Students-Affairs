<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuddyAllocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddies_allocation', function (Blueprint $table) {
            $table->id();

            $table->string('Buddy_otherNAMES')->nullable();
            $table->string('Buddy_suID')->nullable();           

            $table->string('NewSTD_surNAME');
            $table->string('NewSTD_otherNAMES');
            $table->string('NewSTD_passportNUMBER');
            $table->string('NewSTD_course');            
            $table->string('NewSTD_suID')->unique();
            $table->string('NewSTD_email')->unique();
            $table->string('NewSTD_Faculty')->nullable();
            $table->string('passportNUMBER')->nullable();
            $table->string('NewSTD_Nationality')->nullable();
            
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
