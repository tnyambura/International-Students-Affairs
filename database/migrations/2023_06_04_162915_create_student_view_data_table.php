<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentViewDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        $statement = 'CREATE VIEW student_view_data AS
        SELECT 
        `users`.`id` AS `student_id`,
        `users`.`surname` AS `surname`,
        `users`.`other_names` AS `other_names`,
        `users`.`email` AS `email`,
        `student_details`.`phone_number` AS `phone_number`,
        `student_details`.`faculty` AS `faculty`,
        `student_details`.`course` AS `course`,
        `student_details`.`nationality` AS `nationality`,
        `student_details`.`passport_number` AS `passport_number`,
        `student_details`.`passport_expire_date` AS `passport_expire_date`,
        `student_details`.`residence` AS `residence`
    FROM
        ((`users`
        JOIN `student_details`)
        JOIN `user_roles`)
    WHERE
        ((`student_details`.`student_id` = `users`.`id`)
            AND (`user_roles`.`user_id` = `users`.`id`)
            AND (`user_roles`.`role` = "student"))';
        DB::statement($statement);
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS student_view_data');
    }
}
