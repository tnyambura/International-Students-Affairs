<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [   
          
              'surNAME'         => 'Nyambura',
              'otherNAMES'         => 'Thomas Macharia',
              'suID'         => '03187',
              'email'       => 'tmacharia@gmail.com',
              'password' => bcrypt('12345678'),
          
            ]);
    }
}
