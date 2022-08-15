<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\LembarVerifikasi;

class VerifikatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to Show Index File
    public function index(){
        $proposals = File::all();
        $proposal_need_approved = array();
        $approvedProposal = array();
        $rejectedProposal = array();

        forEach($proposals as $proposal){
            if($proposal->verifikator_approved == 0 && $proposal->ajukan_status == 1){
                $proposal->kegiatan;
                array_push($proposal_need_approved, $proposal);
            }else if($proposal->verifikator_approved == 1){
                $proposal->lembarVerifikasi;
                $proposal->kegiatan;
                array_push($approvedProposal, $proposal);
            }else if($proposal->verifikator_approved == 2){
                $proposal->kegiatan;
                array_push($rejectedProposal, $proposal);
            }
        }

        $proposal_need_approved = json_encode($proposal_need_approved);
        $approvedProposal = json_encode($approvedProposal);
        $rejectedProposal = json_encode($rejectedProposal);

        
        return view('verifikator.verifikator_index', ['role' => 'Verifikator', 
                                                        'proposal' => $proposal_need_approved,
                                                        'approvedProposal' => $approvedProposal,
                                                        'rejectedProposal' => $rejectedProposal    
                                                    ]);
    }

    // Function to Approving or Rejecting Proposal
    public function approvedRejectedProposal($id, $data){
        $file = File::findOrFail($id);
        if($file){
            $file->verifikator_approved = $data;
            $file->verifikator_id = auth()->user()->id;
            $file->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve Proposal';
            $file->status = 3;
            $file->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject Proposal';
            $file->status = 2;
            $file->save();
        }

        return redirect()->back()->with(['msg_approveReject' => $msg]);
    }
}
