<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RincianBiaya;

class DummyRincianBiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rincianData = [
            'volume_1' => 1,
            'satuan_1' => 'Orang',
            'volume_2' => 2,
            'satuan_2' => 'Bulan',
            'harga_satuan' => 2750000,
            'jumlah' => 5500000,
            'kegiatan_id' => 1
        ];

        RincianBiaya::create($rincianData);
    }
}
