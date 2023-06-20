<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerUpdateBuddyRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP TRIGGER IF EXISTS update_buddy_request');
        $statement = 'CREATE TRIGGER update_buddy_request AFTER INSERT ON `buddies_allocations` FOR EACH ROW BEGIN
        UPDATE buddy_request
        set status = "approved"
        where buddy_request_id = new.request_id;
        END';
        DB::statement($statement);
    }

    public function down()
    {
        DB::statement('DROP TRIGGER IF EXISTS update_buddy_request');
    }
}
