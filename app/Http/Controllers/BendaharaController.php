<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Bank;
use App\Models\BuktiTransfer;
use DataTables;

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
            // if($proposal->verifikator_approved == 1 && $proposal->ketuaHarian_approved == 0){
            //     if($proposal->lembarVerifikasi){
            //         array_push($proposal_send_to_ketuaBidang, $proposal);
            //         $proposal->lembar_verifikasi;
            //         $proposal->verifikator;
            //         $proposal->suratbayar;
            //         $proposal->kegiatan;
            //         $proposal->kegiatan->kategori->bidang->name;
            //     }
            // }else 
            if($proposal->verifikator_approved == 1 && $proposal->ketuaHarian_approved == 1){
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

    public function bukti(){
        $banks = Bank::all();
        return view('bendahara.bendahara_uploadBukti', ['role' => 'Bendahara',
                                                        'banks' => $banks
                                                    ]);
    }

    public function transfer(Request $request){
        if($request->ajax()){
            $transfer = BuktiTransfer::all();

            return DataTables::of($transfer)
                        ->addIndexColumn()
                        ->editColumn('nama_penerima', function($transfer){
                            return $transfer->nama_penerima;
                        })
                        ->editColumn('alamat_penerima', function($transfer){
                            return $transfer->alamat_penerima;
                        })
                        ->editColumn('npwp_penerima', function($transfer){
                            return $transfer->npwp_penerima;
                        })
                        ->editColumn('rekening_penerima', function($transfer){
                            return $transfer->rekening_penerima;
                        })
                        ->editColumn('bank', function($transfer){
                            return $transfer->bank->name;
                        })
                        ->editColumn('bukti_transfer', function($row){
                            $btn = '<a href="'.route("bendahara.download_bukti", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Download</a>';
                            return $btn;
                        })
                        ->rawColumns(['bukti_transfer'])
                        ->make(true);
        }
        return view('bendahara.bendahara_transfer', ['role' => 'Bendahara',
                                                    ]);
    }
}
