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
        $proposalsApproved = array();
        
        forEach($proposals as $proposal){
            if(($proposal->user->bidang->id == auth()->user()->bidang->id) && 
                ($proposal->verifikator_approved == 0)){
                array_push($proposal_need_approved, $proposal); 
            }
            else if(($proposal->user->bidang->id == auth()->user()->bidang->id) && 
                ($proposal->verifikator_approved == 1)){
                $proposal->lembarVerifikasi;
                array_push($approvedProposal, $proposal);
                
            }
            else if(($proposal->user->bidang->id == auth()->user()->bidang->id) && 
                ($proposal->verifikator_approved == 2)){
                if($proposal->lembar)
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
