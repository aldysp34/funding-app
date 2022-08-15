<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
               'name'=>'Muhammad Aldi Surya Putra',
               'email'=>'aldysp34@gmail.com',
               'user_access'=>'5',
               'password'=> bcrypt('aldysp34'),
            ]
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
