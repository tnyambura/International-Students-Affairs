<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewAllBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::statement('DROP VIEW IF EXISTS all_bookings');
        $statement = 'CREATE OR REPLACE  VIEW all_bookings AS
        SELECT bookingList.id, users.id AS u_id, users.surname, users.other_names, bookingList.booked_date_time , bookingList.status
        FROM users,bookingList WHERE users.id = bookingList.student_id';
        DB::statement($statement);
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS all_bookings');
    }
}
