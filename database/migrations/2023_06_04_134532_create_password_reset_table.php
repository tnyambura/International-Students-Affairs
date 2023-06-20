<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('password_reset');
        Schema::create('password_reset', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(false);
            $table->string('token',100)->nullable(true);
            $table->text('current_pass')->nullable(false);
            $table->text('new_pass')->nullable(true);
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
        Schema::dropIfExists('password_reset');
    }
}
