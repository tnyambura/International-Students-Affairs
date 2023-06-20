<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user_verification');
        Schema::create('user_verification', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(false);
            $table->integer('status')->nullable(false);
            $table->timestamp('verified_at')->nullable(true);
            $table->text('remember_token')->nullable(true);
            $table->timestamps();
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
        Schema::dropIfExists('user_verification');
    }
}
