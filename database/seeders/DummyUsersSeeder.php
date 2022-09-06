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
            ],
            [
                'name' => 'Ketua Bidang',
                'email' => 'ketuabidang@porda.bekasi',
                'user_access' => '1',
                'password' => bcrypt('ketuabidang'),
                'bidang_id' => '1'
            ],
            [
                'name' => 'Verifikator',
                'email' => 'verifikatorg@porda.bekasi',
                'user_access' => '2',
                'password' => bcrypt('verifikatorg')
            ],
            [
                'name' => 'Bendahara',
                'email' => 'bendahara@porda.bekasi',
                'user_access' => '3',
                'password' => bcrypt('bendahara')
            ],
            [
                'name' => 'Ketua Harian',
                'email' => 'ketuaharian@porda.bekasi',
                'user_access' => '4',
                'password' => bcrypt('ketuaharian')
            ],
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
