<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bidang;

class DummyBidangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidangData = [
            [
                'name' => 'Administrasi dan Kesekretariatan'
            ],
            [
                'name' => 'Hukum'
            ],
        ];

        foreach ($bidangData as $key => $val){
            Bidang::create($val);
        }
    }
}
