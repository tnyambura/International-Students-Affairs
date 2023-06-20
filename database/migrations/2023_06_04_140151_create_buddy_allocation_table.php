<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuddyAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('buddies_allocations');
        Schema::create('buddies_allocations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('request_id')->nullable(false);
            $table->bigInteger('student_id')->nullable(false);
            $table->bigInteger('buddy_id')->nullable(false);
            $table->string('request_change',45)->nullable(true);
            $table->boolean('already_changed')->nullable(true);
            $table->foreign('student_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('buddy_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('request_id')->references('buddy_request_id')->on('buddy_request')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buddies_allocations');
    }
}
