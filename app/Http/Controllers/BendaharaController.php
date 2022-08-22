<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class BendaharaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $proposals = File::all();
        $proposal_send_to_ketuaBidang = array();
        $proposal_approved = array();

        forEach($proposals as $proposal){
            if($proposal->verifikator_approved == 1 && $proposal->ketuaHarian_approved == 0){
                if($proposal->lembarVerifikasi){
                    array_push($proposal_send_to_ketuaBidang, $proposal);
                    $proposal->lembar_verifikasi;
                    $proposal->verifikator;
                    $proposal->suratbayar;
                    $proposal->kegiatan;
                    $proposal->kegiatan->kategori->bidang->name;
                }
            }else if($proposal->verifikator_approved == 1 && $proposal->ketuaHarian_approved == 1){
                $proposal->lembar_verifikasi;
                $proposal->verifikator;
                $proposal->suratbayar;
                $proposal->ketuaHarian;
                $proposal->kegiatan;
                $proposal->kegiatan->kategori->bidang->name;
                array_push($proposal_approved, $proposal);
            }
        }

    
        return view('bendahara.bendahara_index', ['role' => 'Bendahara',
                                                'proposal_send_to_ketuaBidang' => json_encode($proposal_send_to_ketuaBidang),
                                                'proposal_approved' => json_encode($proposal_approved)
                                                ]
                                            );
    }
}
