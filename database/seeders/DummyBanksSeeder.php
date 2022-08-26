<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bank;

class DummyBanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = ['BNI', 'BCA', 'BRI', 'Mandiri', 'BSI', 'Danamon'];

        $y = array();
        
        foreach($banks as $x){
            $bank = [
                'name' => $x
            ];
            array_push($y, $bank);
        }

        foreach($y as $z){
            Bank::create($z);
        }
    }
}
