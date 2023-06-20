<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuddyRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('buddy_request');
        Schema::create('buddy_request', function (Blueprint $table) {
            $table->bigInteger('buddy_request_id')->primary()->nullable(false);
            $table->bigInteger('student_id')->nullable(false);
            $table->integer('year')->nullable(false);
            $table->enum('status',['pending', 'cancel', 'approved'])->nullable(false);
            $table->timestamp('request_date')->nullable(false);
            $table->foreign('student_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buddy_request');
    }
}
