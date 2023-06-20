<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('user_roles');
        Schema::create('user_roles',function(Blueprint $table){
            $table->bigInteger('id')->autoIncrement()->nullable(false);
            $table->bigInteger('user_id')->nullable(false);
            $table->enum('role',['admin', 'super_admin', 'student', 'buddy'])->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
