<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('student_details');
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->nullable(false);
            $table->string('phone_number',20)->nullable(false);
            $table->string('faculty',200)->nullable(false);
            $table->string('course',200)->nullable(false);
            $table->string('nationality',150)->nullable(false);
            $table->string('passport_number',20)->unique()->nullable(false);
            $table->date('passport_expire_date')->nullable(false);
            $table->string('passport_image',200)->nullable(true);
            $table->string('residence',200)->nullable(true);
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
        Schema::dropIfExists('student_details');
    }
}
