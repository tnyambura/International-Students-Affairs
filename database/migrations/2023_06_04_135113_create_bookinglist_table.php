<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookinglistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bookingList');
        Schema::create('bookingList', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->nullable(false);
            $table->timestamp('booked_date_time')->nullable(false);
            $table->enum('status',['pending', 'past', 'met'])->nullable(false);
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
        Schema::dropIfExists('bookingList');
    }
}
