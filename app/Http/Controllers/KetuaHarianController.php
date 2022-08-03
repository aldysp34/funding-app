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

        forEach($proposals as $proposal){
            if($proposal->user->bidang->id == auth()->user()->bidang->id){
                if($proposal->suratbayar && $proposal->lembarVerifikasi){
                    if($proposal->ketuaHarian_approved == 0){
                        $proposal->verifikator;
                        array_push($proposal_need_approved, $proposal);

                    }else if($proposal->ketuaHarian_approved == 1){
                        array_push($proposal_approved, $proposal);
                    }else{
                        array_push($proposal_rejected, $proposal);
                    }
                }
            }
        }

        return view('ketuaHarian.ketuaHarian_index', ['role' => 'Ketua Harian',
                                                    'proposal_need_approved' => json_encode($proposal_need_approved),
                                                    'proposal_approved' => json_encode($proposal_approved),
                                                    'proposal_rejected' => json_encode($proposal_rejected)    
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
        }else if($data == 2){
            $msg = 'Berhasil Reject Proposal';
        }

        return redirect()->back()->with(['msg_approveReject' => $msg]);
    }
}
