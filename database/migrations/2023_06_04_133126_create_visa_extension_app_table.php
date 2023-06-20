<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaExtensionAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('extension_application');
        Schema::create('extension_application', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->nullable(false);
            $table->bigInteger('student_id')->nullable(false);
            $table->text('passport_biodata')->nullable(false);
            $table->text('entry_visa')->nullable(true);
            $table->text('current_visa')->nullable(false);
            $table->date('date_of_entry')->nullable(false);
            $table->dateTime('application_date')->nullable(false);
            $table->enum('application_status',['pending', 'declined', 'in progress', 'approved'])->nullable(false);
            $table->text('uploads')->nullable(true);
            $table->date('expiry_date')->nullable(true);
            $table->string('first_open',20)->nullable(true);
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
        Schema::dropIfExists('extension_application');
    }
}
