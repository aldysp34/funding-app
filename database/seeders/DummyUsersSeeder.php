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
               'user_access'=>'3',
               'bidang_id' => '1' ,
               'password'=> bcrypt('aldysp34'),
            ],
            [
               'name'=>'Ibnu Syuhada',
               'email'=>'ibnu24@gmail.com',
                'user_access'=>'4',
                'bidang_id' => '2' ,
               'password'=> bcrypt('aldysp34'),
            ],
            [
                'name'=>'Maulana Luthfi',
                'email'=>'lupi24@gmail.com',
                 'user_access'=>'1',
                 'bidang_id' => '2' ,
                'password'=> bcrypt('aldysp34'),
             ],
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
