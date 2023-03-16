<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyKppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_kpps', function (Blueprint $table) {
            $table->id();
            $table->string('surNAME');
            $table->string('otherNAMES');
            $table->string('passportNUMBER');
            $table->string('suID');
            $table->string('Course');
            $table->string('Residence');
            $table->string('suEMAIL');
            $table->string('Nationality');
            $table->string('dateofENTRY');
            $table->string('phoneNUMBER');
            $table->mediumText('passportPICTURE')->nullable();
            $table->mediumText('biodataPAGE')->nullable();
            $table->mediumText('currentVISA')->nullable();
            $table->mediumText('guardiansID')->nullable();
            $table->mediumText('commitmentLETTER')->nullable();
            $table->mediumText('academicTRANSCRIPTS')->nullable();
            $table->mediumText('policeCLEARANCE')->nullable();
            $table->string('Faculty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_kpps');
    }
}
