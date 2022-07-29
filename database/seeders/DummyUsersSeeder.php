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
               'name'=>'Admin',
               'email'=>'johndoe@hotmail.com',
                'user_access'=>'1',
               'password'=> bcrypt('aldysp34'),
            ],
            [
               'name'=>'Regular User',
               'email'=>'reguser@gmail.com',
                'user_access'=>'2',
               'password'=> bcrypt('aldysp34'),
            ],
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
