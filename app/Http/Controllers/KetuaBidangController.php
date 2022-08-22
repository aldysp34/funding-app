<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\SatuanVolume;
use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Builder;
use DataTables;

class KetuaBidangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $bidangId = auth()->user()->bidang_id;
        $proposal = File::with('kegiatan')->whereHas('kegiatan', function(Builder $query) use($bidangId){
            $query->where('bidang_id', '=', $bidangId);
        })->get();
        // dd($proposal);
        $proposal_submit = array();
        $proposal_cancel = array();
        foreach($proposal as $x){
            if($x->ajukan_status == 1){
                array_push($proposal_submit, $x);
                $x->kegiatan->kategori->bidang->name;
            }else{
                array_push($proposal_cancel, $x);
                $x->kegiatan->kategori->bidang->name;
            }
        }
        return view('ketuaBidang.ketuaBidang_index', ['role' => 'Ketua Bidang',
                                                      'proposal_cancel' => json_encode($proposal_cancel), 
                                                      'proposal_submit' => json_encode($proposal_submit)
                                                    ]);
    }

    public function upload_dokumen(Request $request){
        if($request->ajax()){
            $kegiatan = Kegiatan::where('bidang_id', auth()->user()->bidang->id)
                            ->with('bidang')
                            ->with('rincianBiaya')
                            ->with('kategori');
            
            return DataTables::of($kegiatan)
                        ->addIndexColumn()
                        ->editColumn('kategori', function ($kegiatan){
                            return $kegiatan->kategori->name;
                        })
                        ->editColumn('bidang', function ($kegiatan){
                            return $kegiatan->bidang->name;
                        })
                        ->editColumn('volume 1', function ($kegiatan){
                            return $kegiatan->rincianBiaya->volume_1;
                        })
                        ->editColumn('satuan 1', function ($kegiatan){
                            return $kegiatan->rincianBiaya->satuan_1;
                        })
                        ->editColumn('volume 2', function ($kegiatan){
                            return $kegiatan->rincianBiaya->volume_2;
                        })
                        ->editColumn('satuan 2', function ($kegiatan){
                            return $kegiatan->rincianBiaya->satuan_2;
                        })
                        ->editColumn('volume 3', function ($kegiatan){
                            return $kegiatan->rincianBiaya->volume_3;
                        })
                        ->editColumn('satuan 3', function ($kegiatan){
                            return $kegiatan->rincianBiaya->satuan_3;
                        })
                        ->addColumn('action', function($row){
       
                            $btn = '<a href="'.route("ketua-bidang.dokumen", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Tambahkan Proposal</a>';
      
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                    
        }
        return view('ketuaBidang.ketuaBidang_listDoc', ['role' => 'Ketua Bidang']);
    }

    public function dokumen($id){
        $kegiatan = Kegiatan::where('id', $id)->first();
        $kegiatan->rincianBiaya;
        return view('ketuaBidang.ketuaBidang_uploadDoc', ['role' => 'KetuaBidang', 'kegiatan' => $kegiatan]);
    }


}
