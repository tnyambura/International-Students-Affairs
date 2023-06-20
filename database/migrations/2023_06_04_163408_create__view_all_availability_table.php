<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateViewAllAvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP VIEW IF EXISTS all_availability');
        $statement = 'CREATE VIEW all_availability AS
        SELECT users.id AS user_id, users.surname, users.other_names, scheduleTime.user_id AS admin_id, scheduleTime.my_schedule 
        FROM users,scheduleTime WHERE users.id = scheduleTime.user_id';
        DB::statement($statement);
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS all_availability');
    }
}
