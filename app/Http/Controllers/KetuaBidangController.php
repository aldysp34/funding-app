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
                        ->editColumn('anggaran', function ($kegiatan){
                            return $kegiatan->budget;
                        })
                        ->addColumn('action', function($row){
       
                            $btn = '<a href="'.route("ketua-bidang.dokumen", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Tambahkan Proposal</a>';
      
                            return $btn;
                        })
                        ->removeColumn('volume 1')
                        ->removeColumn('satuan 1')
                        ->removeColumn('volume 2')
                        ->removeColumn('satuan 2')
                        ->removeColumn('volume 3')
                        ->removeColumn('satuan 3')
                        ->rawColumns(['action'])
                        ->make(true);
                    
        }
        return view('ketuaBidang.ketuaBidang_listDoc', ['role' => 'Ketua Bidang']);
    }

    public function dokumen($id){
        $kegiatan = Kegiatan::where('id', $id)->first();
        $kegiatan->rincianBiaya;
        $kegiatan->kategori;
        $kegiatan->bidang;
        return view('ketuaBidang.ketuaBidang_uploadDoc', ['role' => 'Ketua Bidang', 'kegiatan' => $kegiatan]);
    }

    public function upload_lpj(Request $request){
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
                        ->editColumn('anggaran', function ($kegiatan){
                            return $kegiatan->budget;
                        })
                        ->addColumn('action', function($row){

                            $btn = '<a href="'.route("ketua-bidang.view_upload_lpj", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Tambahkan LPJ</a>';

                            return $btn;
                        })
                        ->removeColumn('volume 1')
                        ->removeColumn('satuan 1')
                        ->removeColumn('volume 2')
                        ->removeColumn('satuan 2')
                        ->removeColumn('volume 3')
                        ->removeColumn('satuan 3')
                        ->rawColumns(['action'])
                        ->make(true);
        }
        return view('ketuaBidang.ketuaBidang_listLPJ', ['role' => 'Ketua Bidang']);
    }

    public function view_upload_lpj($id){
        $kegiatan = Kegiatan::where('id', $id)->first();
        $kegiatan->rincianBiaya;
        $kegiatan->kategori;
        $kegiatan->bidang;
        return view('ketuaBidang.ketuaBidang_uploadLPJ', ['role' => 'Ketua Bidang', 'kegiatan' => $kegiatan]);
    }


}
