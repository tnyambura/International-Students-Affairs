<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentGuardianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('student_guardian');
        Schema::create('student_guardian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->nullable(false);
            $table->string('full_name',200)->nullable(false);
            $table->string('email',200)->nullable(false);
            $table->string('phone_number',50)->nullable(false);
            $table->enum('status',['primary', 'secondary', 'other', 'notApplicable'])->nullable(false);
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
        Schema::dropIfExists('student_guardian');
    }
}
