<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;



class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::insert(
            [

              'id'         => '100001',
              'surname'         => 'Nyambura',
              'other_names'         => 'Thomas Macharia',
              'gender'         => 'm',
              'email'       => 'tmacharia@gmail.com',
              'password' => Hash::make('123456'),
              'remember_token'       => '',
              'status'       => 1

            ]);
    }
}
