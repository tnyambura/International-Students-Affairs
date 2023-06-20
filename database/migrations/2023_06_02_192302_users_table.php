<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('migration');
        // Schema::dropIfExists('users');
        Schema::create('users',function(Blueprint $table){
            $table->bigInteger('id')->primary()->nullable(false);
            $table->string('surname',50)->nullable(false);
            $table->string('other_names',100)->nullable(false);
            $table->enum('gender',['m','f'])->nullable(false);
            $table->string('email',100)->unique()->nullable(false);
            $table->text('password',255)->nullable(false);
            $table->string('remember_token',100)->nullable(true);
            $table->integer('status')->nullable(false);
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
