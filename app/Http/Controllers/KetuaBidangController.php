<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class KetuaBidangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $proposal = File::where('user_id', auth()->user()->id)->get();

        $proposal_submit = array();
        $proposal_cancel = array();
        foreach($proposal as $x){
            if($x->ajukan_status == 1){
                array_push($proposal_submit, $x);
            }else{
                array_push($proposal_cancel, $x);
            }
        }
        return view('ketuaBidang.ketuaBidang_index', ['role' => 'Ketua Bidang',
                                                      'proposal_cancel' => json_encode($proposal_cancel), 
                                                      'proposal_submit' => json_encode($proposal_submit)
                                                    ]);
    }

    public function upload_dokumen(){
        return view('ketuaBidang.ketuaBidang_uploadDoc', ['role' => 'Ketua Bidang']);
    }
}
