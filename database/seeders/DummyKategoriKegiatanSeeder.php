<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriKegiatan;

class DummyKategoriKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriData = [
            [
                'name' => 'Belanja Alat Tulis Kantor',
                'bidang_id' => 1
            ],
            [
                'name' => 'Belanja Sewa Kantor',
                'bidang_id' => 1
            ],
            [
                'name' => 'Belanja Makan dan Minuman Rapat',
                'bidang_id' => 2
            ],
            [
                'name' => 'Belanja Advokasi/Pendampingan',
                'bidang_id' => 2
            ]
        ];

        foreach ($kategoriData as $key => $val){
            KategoriKegiatan::create($val);
        }
    }
}
