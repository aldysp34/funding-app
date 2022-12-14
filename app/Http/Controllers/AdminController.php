<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBidangRequest;
use App\Models\Bidang;
use App\Models\User;
use App\Models\File;
use App\Models\Kegiatan;
use App\Models\SatuanVolume;
use App\Models\KategoriKegiatan;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_index', ['role' => 'Admin']);
    }

    public function bidang(){
        $bidangs = Bidang::all();
        $bidang = array();
        $users = User::all();

        foreach($bidangs as $x){
            $newBidang = array('name' => '', 'count' => 0);
            foreach($users as $user){
                $newBidang['name'] = $x->name;
                $newBidang['id'] = $x->id;
                if($user->bidang_id == $x->id){
                    $newBidang['count']++;
                    if($user->user_access == 4){
                        $newBidang['ketua_harian'] = $user->name;
                    }
                }
            }
            array_push($bidang, $newBidang);
        }
        
        // dd($bidang);
        return view('admin.admin_bidang', ['role' => 'Admin',
                                            'bidang' => json_encode($bidang)
                                        ]);
    }

    public function user(){
        $users = User::get();
        $bidangs = Bidang::all();
        for($i=0;$i<count($users);$i++){
            $users[$i]->bidang;
        }

        // dd(json_encode($users));
        
        return view('admin.admin_user', ['role' => 'Admin',
                                        'user' => json_encode($users),
                                        'bidang' => $bidangs
                                        ]);
    }

    public function files(){
        $files = File::all();
        for($i=0;$i<count($files);$i++){
            $files[$i]->lembar_verifikasi;
            $files[$i]->user->bidang;
        }
        return view('admin.admin_files', ['role' => 'Admin',
                                            'files' => json_encode($files)
                                        ]);
    }

    public function kegiatan(){
        $kegiatan = Kegiatan::all();
        foreach($kegiatan as $x){
            $x->bidang;
            if($x->rincianBiaya){
                $x->rincianBiaya;
            }
        }
        $satuan = SatuanVolume::all();
        $bidang = Bidang::all();
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('admin.admin_kegiatan', ['role' => 'Admin',
                                            'kegiatan' => json_encode($kegiatan),
                                            'satuan' => $satuan,
                                            'bidang' => $bidang,
                                            'kategori' => $kategori_kegiatan                      
                                        ]);
    }

    public function list_kategori($id){
        $kategori = KategoriKegiatan::where('bidang_id', '=', $id)->get();
        // dd($kategori);
        echo json_encode($kategori);
    }
}
