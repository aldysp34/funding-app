<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SatuanVolume;

class DummySatuansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuanData = [
            'Orang', 'Bulan', 'O/K', 'Hari', 'Rim', 'Dus', 'Pax', 'Set', 'Warna', 'Bh', 'Buku', 'Dus', 'Buah', 'Box', 'Unit', 'Lembar', 'Lusin','Galon', 'Kali', 'Kegiatan',
            'Stel', 'Pcs', 'Keping', 'Kendaraan', 'PP', 'Pencap'
        ];
        
        $y = array();
        foreach($satuanData as $x){
            $satuan = [
                'name' => $x
            ];
            array_push($y, $satuan);
        }

        foreach($y as $j => $z){
            SatuanVolume::create($z);
        }
    }
}
