<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_admin_table', function (Blueprint $table) {
            $table->id();
            $table->string('suID')->unique();
            $table->string('suEMAIL')->unique();
            $table->string('surNAME');
            $table->string('otherNAMES');
            $table->string('passportNUMBER');
            $table->string('Residence');
            $table->string('Nationality');
            $table->string('phoneNUMBER');
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
