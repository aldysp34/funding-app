<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Lpj;
use DataTables;

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

    public function approvedRejectedLpj($id, $data){
        $lpj = Lpj::findOrFail($id);
        if($lpj){
            $lpj->ketuaHarian_approved = $data;
            $lpj->ketuaHarian_id = auth()->user()->id;
            $lpj->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve LP';
            $lpj->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject LP';
            $lpj->save();
        }

        return redirect()->back()->with(['msg_approveReject' => $msg]);
    }

    public function dashboard_lpj(){
        return view('ketuaHarian.ketuaHarian_lpj', ['role' => 'Ketua Harian']);
    }

    public function lpj_need_approved(Request $request){
        if($request->ajax()){

            $lpj = Lpj::where('ketuaHarian_approved', 0)
                            ->with('file');
            return DataTables::of($lpj)
                        ->addIndexColumn()
                        ->editColumn('kategori', function ($lpj){
                            return $lpj->file->kegiatan->kategori->name;
                        })
                        ->editColumn('bidang', function ($lpj){
                            return $lpj->file->kegiatan->bidang->name;
                        })
                        ->editColumn('action', function($row){
                            $btn_ = '';
                            $btn = '<a href="'.route("ketua-harian.approvedRejectedLpj", ['id' => $row->id, 'data' => 1]).'" class="edit btn btn-primary btn-sm">Approve</a>';
                            $btn = $btn.'<a href="'.route("ketua-harian.approvedRejectedLpj", ['id' => $row->id, 'data' => 2]).'" class="edit btn btn-danger btn-sm">Reject</a>';
                            $btn = $btn.$btn = '<a href="'.route("ketua-harian.download_lpj", ['id' => $row->id]).'" class="edit btn btn-secondary btn-sm">Download</a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
    }

    public function lpj_approved(Request $request){
        if($request->ajax()){

            $lpj = Lpj::where('ketuaHarian_approved', 1)
                            ->with('file');
            return DataTables::of($lpj)
                        ->addIndexColumn()
                        ->editColumn('kategori', function ($lpj){
                            return $lpj->file->kegiatan->kategori->name;
                        })
                        ->editColumn('bidang', function ($lpj){
                            return $lpj->file->kegiatan->bidang->name;
                        })
                        ->editColumn('action', function($row){
                            $btn = '<a href="'.route("ketua-harian.download_lpj", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Download</a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
    }

    public function lpj_rejected(Request $request){
        if($request->ajax()){

            $lpj = Lpj::where('ketuaHarian_approved', 2)
                            ->with('file');
            return DataTables::of($lpj)
                        ->addIndexColumn()
                        ->editColumn('kategori', function ($lpj){
                            return $lpj->file->kegiatan->kategori->name;
                        })
                        ->editColumn('bidang', function ($lpj){
                            return $lpj->file->kegiatan->bidang->name;
                        })
                        ->editColumn('action', function($row){
                            $btn = '<a href="'.route("ketua-harian.download_lpj", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Download</a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
    }

    private function create_datatable($ketuaHarian_approved){
        $lpj = Lpj::where('ketuaHarian_approved', $ketuaHarian_approved)
                        ->with('file');
        return DataTables::of($lpj)
                    ->addIndexColumn()
                    ->editColumn('kategori', function ($lpj){
                        return $lpj->file->kegiatan->kategori->name;
                    })
                    ->editColumn('bidang', function ($lpj){
                        return $lpj->file->kegiatan->bidang->name;
                    })
                    ->editColumn('action', function($row){
                        $btn_ = '';
                        if($ketuaHarian_approved == 0){
                            $btn = '<a href="'.route("ketuaHarian.approvedRejectedLpj", ['id' => $row->id, 'data' => 1]).'" class="edit btn btn-primary btn-sm">Approve</a>';
                            $btn = $btn.'<a href="'.route("ketuaHarian.approvedRejectedLpj", ['id' => $row->id, 'data' => 2]).'" class="edit btn btn-danger btn-sm">Reject</a>';
                        }else{
                            $btn = '<a href="'.route("ketuaHarian.download_lpj", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Approve</a>';
                        }

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
}
