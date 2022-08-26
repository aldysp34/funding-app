<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class KetuaHarianController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $proposals = File::all();
        $proposal_need_approved = array();
        $proposal_approved = array();
        $proposal_rejected = array();
        $jumlah = 0;
        
        forEach($proposals as $proposal){
            if($proposal->lembarVerifikasi){
                if($proposal->ketuaHarian_approved == 0){
                    $proposal->verifikator;
                    $proposal->kegiatan;
                    $proposal->kegiatan->kategori->bidang->name;
                    array_push($proposal_need_approved, $proposal);

                }else if($proposal->ketuaHarian_approved == 1){
                    $proposal->verifikator;
                    $proposal->kegiatan;
                    $proposal->kegiatan->kategori->bidang->name;
                    $jumlah += $proposal->kegiatan->budget;
                    array_push($proposal_approved, $proposal);
                }else{
                    $proposal->verifikator;
                    $proposal->kegiatan;
                    $proposal->kegiatan->kategori->bidang->name;
                    array_push($proposal_rejected, $proposal);
                }
            }
        }
        
        $count_proposal = count($proposal_approved);
        $jumlah = number_format($jumlah, 2);

        return view('ketuaHarian.ketuaHarian_index', ['role' => 'Ketua Harian',
                                                    'proposal_need_approved' => json_encode($proposal_need_approved),
                                                    'proposal_approved' => json_encode($proposal_approved),
                                                    'proposal_rejected' => json_encode($proposal_rejected),
                                                    'count_proposal' => $count_proposal,
                                                    'jumlah' => $jumlah   
                                                    ]);
    }

    public function approvedRejectedProposal($id, $data){
        $file = File::findOrFail($id);
        if($file){
            $file->ketuaHarian_approved = $data;
            $file->ketuaHarian_id = auth()->user()->id;
            $file->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve Proposal';
            $file->status = 1;
            $file->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject Proposal';
            $file->status = 2;
            $file->save();
        }

        return redirect()->back()->with(['msg_approveReject' => $msg]);
    }
}
