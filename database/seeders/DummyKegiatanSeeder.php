<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kegiatan;

class DummyKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kegiatanData = [
            'name' => 'PENANGGUNGJAWAB',
            'budget' => '5500000',
            'bidang_id' => '1',
        ];

        Kegiatan::create($kegiatanData);
    }
}
