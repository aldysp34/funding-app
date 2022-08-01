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
        return view('ketuaBidang.ketuaBidang_index', ['role' => 'Ketua Bidang',
                                                      'proposal' => $proposal, 
                                                    ]);
    }

    public function upload_dokumen(){
        return view('ketuaBidang.ketuaBidang_uploadDoc', ['role' => 'Ketua Bidang']);
    }
}
