<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\LembarVerifikasi;
use App\Models\Kegiatan;
use App\Models\Lpj;
use DataTables;

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
                $proposal->kegiatan->kategori->bidang->name;
                array_push($proposal_need_approved, $proposal);
            }else if($proposal->verifikator_approved == 1){
                $proposal->lembarVerifikasi;
                $proposal->kegiatan;
                $proposal->kegiatan->kategori->bidang->name;
                array_push($approvedProposal, $proposal);
            }else if($proposal->verifikator_approved == 2){
                $proposal->kegiatan;
                $proposal->kegiatan->kategori->bidang->name;
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

    public function upload_detail($id){
        $kegiatan = Kegiatan::where('id', $id)->first();
        $kegiatan->rincianBiaya;
        $kegiatan->kategori;
        $kegiatan->bidang;
        $kegiatan->file;
        
    
        return view('verifikator.verifikator_upload', ['role' => 'Verifikator', 'kegiatan' => $kegiatan]);
    }

    public function approvedRejectedLpj($id, $data){
        $lpj = Lpj::findOrFail($id);
        if($lpj){
            $lpj->verifikator_approved = $data;
            $lpj->verifikator_id = auth()->user()->id;
            $lpj->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve LPJ';
            $lpj->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject LPJ';
            $lpj->save();
        }

        return redirect()->back()->with(['msg_approveReject' => $msg]);
    }

    public function dashboard_lpj(){
        return view('verifikator.verifikator_lpj', ['role' => 'Verifikator']);
    }

    public function lpj_need_approved(Request $request){
        if($request->ajax()){

            $lpj = Lpj::where('verifikator_approved', 0)
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
                            $btn = '<a href="'.route("verifikator.approvedRejectedLpj", ['id' => $row->id, 'data' => 1]).'" class="edit btn btn-primary btn-sm">Approve</a>';
                            $btn = $btn.'<a href="'.route("verifikator.approvedRejectedLpj", ['id' => $row->id, 'data' => 2]).'" class="edit btn btn-danger btn-sm">Reject</a>';
                            $btn = $btn.'<a href="'.route("verifikator.download_lpj", ['id' => $row->id]).'" class="edit btn btn-secondary btn-sm">Download</a>';
    
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
    }

    public function lpj_approved(Request $request){
        if($request->ajax()){

            $lpj = Lpj::where('verifikator_approved', 1)
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
                            $btn = '<a href="'.route("verifikator.download_lpj", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Download</a>';

                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
    }

    public function lpj_rejected(Request $request){
        if($request->ajax()){

            $lpj = Lpj::where('verifikator_approved', 2)
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
                            $btn = '<a href="'.route("verifikator.download_lpj", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Download</a>';

                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
    }

    private function create_datatable($verifikator_approved){
        $lpj = Lpj::where('verifikator_approved', $verifikator_approved)
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
                        if($verifikator_approved == 0){
                            $btn = '<a href="'.route("verifikator.approvedRejectedLpj", ['id' => $row->id, 'data' => 1]).'" class="edit btn btn-primary btn-sm">Approve</a>';
                            $btn = $btn.'<a href="'.route("verifikator.approvedRejectedLpj", ['id' => $row->id, 'data' => 2]).'" class="edit btn btn-danger btn-sm">Reject</a>';
                        }else{
                            $btn = '<a href="'.route("verifikator.download_lpj", ['id' => $row->id]).'" class="edit btn btn-primary btn-sm">Download</a>';
                        }

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
    
}
