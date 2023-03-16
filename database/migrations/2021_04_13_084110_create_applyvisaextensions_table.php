<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyvisaextensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applyvisaextensions', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('Not Initiated');
            $table->string('surNAME');
            $table->string('otherNAMES');
            $table->string('passportNUMBER');
            $table->string('suEMAIL');
            $table->string('suID');
            $table->string('Nationality');
            $table->string('dateofENTRY');
            $table->string('Biodata');
            $table->string('passportPIC');
            $table->string('entryVISA');
            $table->string('currentVISA');
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
        Schema::dropIfExists('applyvisaextensions');
    }
}
