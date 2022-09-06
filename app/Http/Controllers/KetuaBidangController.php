<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\SatuanVolume;
use App\Models\Kegiatan;
use App\Models\KategoriKegiatan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use DataTables;
use DB;

class KetuaBidangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $bidangId = auth()->user()->bidang_id;
        $proposal = File::with('kategoriKegiatan')->whereHas('kategoriKegiatan', function(Builder $query) use($bidangId){
            $query->where('bidang_id', '=', $bidangId);
        })->get();
        // $proposal = File::with('kegiatan')->whereHas('kegiatan', function(Builder $query) use($bidangId){
        //     $query->where('bidang_id', '=', $bidangId);
        // })->get();
        // dd($proposal);
        $proposal_submit = array();
        $proposal_cancel = array();
        foreach($proposal as $x){
            if($x->ajukan_status == 1){
                array_push($proposal_submit, $x);
                $x->kategoriKegiatan->bidang->name;
            }else{
                array_push($proposal_cancel, $x);
                $x->kategoriKegiatan->bidang->name;
            }
        }
        return view('ketuaBidang.ketuaBidang_index', ['role' => 'Ketua Bidang',
                                                      'proposal_cancel' => json_encode($proposal_cancel), 
                                                      'proposal_submit' => json_encode($proposal_submit)
                                                    ]);
    }

    public function upload_dokumen(Request $request){
        

        // $kategoriKegiatan = Kegiatan::where('bidang_id', auth()->user()->bidang->id)->orderBy('kategori_id')->get();
        // $kategori = $kategoriKegiatan->groupBy('kategori_id');

        // dd($kategori);
        // $kategoriKegiatan = Kegiatan::where('bidang_id', auth()->user()->bidang->id)->orderBy('kategori_id')->get()->groupBy('kategori_id');
        // dd($kategoriKegiatan);
        // $kategoriKegiatan = Kegiatan::where('bidang_id', auth()->user()->bidang->id)->orderBy('kategori_id')->get()->groupBy('kategori_id');
        // $kategoriKegiatan = collect($kategoriKegiatan);
        // dd($kategoriKegiatan);
        // $bidangId = auth()->user()->bidang_id;
        // $kategoriKegiatan = Kegiatan::where('bidang_id', $bidangId)->get();
        // $key_data = array();
        // $array_by_kategori = array();
        // foreach($kategoriKegiatan as $x){
        //     array_push($key_data, $x->kategori_id);
        // }
        // foreach($key_data as $x){
        //     $temp = array();
        //     $budget = 0;
        //     $name = '';
        //     $id = '';
        //     $bidang = '';
        //     foreach($kategoriKegiatan as $y){
        //         if($y->kategori->id == $x){
        //             $name = $y->kategori->name;
        //             $budget += $y->budget;
        //             $id = $y->kategori->id;
        //             $bidang = $y->bidang->name;
        //         }
        //     }
        //     $array_by_kategori[$x]['id'] = $id;
        //     $array_by_kategori[$x]['name'] = $name;
        //     $array_by_kategori[$x]['budget'] = $budget;
        //     $array_by_kategori[$x]['bidang'] = $bidang;
        // }
        // dd($array_by_kategori);
        if($request->ajax()){
            

            
            // $kategoriKegiatan = Kegiatan::where('bidang_id', auth()->user()->bidang->id)->orderBy('kategori_id')->get();
            // $kategori = $kategoriKegiatan->groupBy('kategori_id');
            // $budget_total = array();
            // foreach($kategoriKegiatan as $x){
            //     $budget = 0;
            //     foreach($x as $y){
            //         $budget += $y->budget;
            //     }
            //     array_push($budget_total, $budget);
            // }
            // $kategori = json_decode(json_encode($kategoriKegiatan));
            
            // return DataTables::of($kategori)
            //                 ->addIndexColumn()
            //                 ->editColumn('kategori', function ($kategori){
            //                     return $kategori->kegiatan->kategori->name;
            //                 })
            //                 ->editColumn('bidang', function ($kategori){
            //                     return $kategori;
            //                 })
            //                 ->editColumn('anggaran', function ($kategori){
            //                     return $kategori;
            //                 })
            //                 ->addColumn('action', function($row){
       
            //                     // $btn = '<a href="'.route("ketua-bidang.dokumen", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Tambahkan Proposal</a>';
        
            //                     // return $btn;
            //                     return $row;
            //                 })
            //                 ->make(true);

            


            
            // $kegiatan = Kegiatan::where('bidang_id', auth()->user()->bidang->id)
            //                 ->with('bidang')
            //                 ->with('rincianBiaya')
            //                 ->with('kategori');

            // return DataTables::of($kegiatan)
            //             ->addIndexColumn()
            //             ->editColumn('kategori', function ($kegiatan){
            //                 return $kegiatan->kategori->name;
            //             })
            //             ->editColumn('bidang', function ($kegiatan){
            //                 return $kegiatan->bidang->name;
            //             })
            //             ->editColumn('anggaran', function ($kegiatan){
            //                 return $kegiatan->budget;
            //             })
            //             ->addColumn('action', function($row){
       
            //                 $btn = '<a href="'.route("ketua-bidang.dokumen", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Tambahkan Proposal</a>';
      
            //                 return $btn;
            //             })
            //             ->removeColumn('volume 1')
            //             ->removeColumn('satuan 1')
            //             ->removeColumn('volume 2')
            //             ->removeColumn('satuan 2')
            //             ->removeColumn('volume 3')
            //             ->removeColumn('satuan 3')
            //             ->rawColumns(['action'])
            //             ->make(true);
            $bidangId = auth()->user()->bidang_id;
            $kategoriKegiatan = Kegiatan::where('bidang_id', $bidangId)->get();
            $key_data = array();
            $array_by_kategori = array();
            foreach($kategoriKegiatan as $x){
                array_push($key_data, $x->kategori_id);
            }
            foreach($key_data as $x){
                $temp = array();
                $budget = 0;
                $name = '';
                $id = '';
                $bidang = '';
                foreach($kategoriKegiatan as $y){
                    if($y->kategori->id == $x){
                        $name = $y->kategori->name;
                        $budget += $y->budget;
                        $id = $y->kategori->id;
                        $bidang = $y->bidang->name;
                    }
                }
                $array_by_kategori[$x]['id'] = $id;
                $array_by_kategori[$x]['name'] = $name;
                $array_by_kategori[$x]['budget'] = $budget;
                $array_by_kategori[$x]['bidang'] = $bidang;
            }

            return DataTables::of($array_by_kategori)
                        ->addIndexColumn()
                        ->editColumn('kategori', function($row){
                            return $row['name'];
                        })
                        ->editColumn('bidang', function($row){
                            return $row['bidang'];
                        })
                        ->editColumn('anggaran', function($row){
                            return $row['budget'];
                        })
                        ->editColumn('action', function($row){
                            $btn = '<a href="'.route("ketua-bidang.dokumen", ['id' => $row['id'], 'budget' => $row['budget']]).'" class="edit btn btn-primary btn-sm">Tambahkan Proposal</a>';
      
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        return view('ketuaBidang.ketuaBidang_listDoc', ['role' => 'Ketua Bidang']);
    }

    public function dokumen($id, $budget){
        $kegiatan = KategoriKegiatan::where('id', $id)->first();
        $kegiatan->rincianBiaya;
        $kegiatan->kategori;
        $kegiatan->bidang;
        $kegiatan->budget = $budget;
        return view('ketuaBidang.ketuaBidang_uploadDoc', ['role' => 'Ketua Bidang', 'kegiatan' => $kegiatan]);
    }

    public function upload_lpj(Request $request){
        if($request->ajax()){
            $bidangId = auth()->user()->bidang_id;
            $kategoriKegiatan = Kegiatan::where('bidang_id', $bidangId)->get();
            $key_data = array();
            $array_by_kategori = array();
            foreach($kategoriKegiatan as $x){
                array_push($key_data, $x->kategori_id);
            }
            foreach($key_data as $x){
                $temp = array();
                $budget = 0;
                $name = '';
                $id = '';
                $bidang = '';
                foreach($kategoriKegiatan as $y){
                    if($y->kategori->id == $x){
                        $name = $y->kategori->name;
                        $budget += $y->budget;
                        $id = $y->kategori->id;
                        $bidang = $y->bidang->name;
                    }
                }
                $array_by_kategori[$x]['id'] = $id;
                $array_by_kategori[$x]['name'] = $name;
                $array_by_kategori[$x]['budget'] = $budget;
                $array_by_kategori[$x]['bidang'] = $bidang;
            }

            return DataTables::of($array_by_kategori)
                        ->addIndexColumn()
                        ->editColumn('kategori', function($row){
                            return $row['name'];
                        })
                        ->editColumn('bidang', function($row){
                            return $row['bidang'];
                        })
                        ->editColumn('anggaran', function($row){
                            return $row['budget'];
                        })
                        ->editColumn('action', function($row){
                            $btn = '<a href="'.route("ketua-bidang.view_upload_lpj", ['id' => $row['id']]).'" class="edit btn btn-primary btn-sm">Tambahkan LPJ</a>';
      
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        return view('ketuaBidang.ketuaBidang_listLPJ', ['role' => 'Ketua Bidang']);
    }

    public function view_upload_lpj($id){
        $kategori = KategoriKegiatan::where('id', $id)->first();
        $kategori->bidang;
        $kategori->file();
        return view('ketuaBidang.ketuaBidang_uploadLPJ', ['role' => 'Ketua Bidang', 'kategori' => $kategori]);
    }


}
